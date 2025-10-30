<?php

namespace App\Services\Importers;

use App\Models\Post;
use Illuminate\Support\Facades\Http;

class PostImporter
{
    public function import(string $source, $user_id): ?Post
    {
        [$url, $id] = $this->randomUrl($source);
        $response = Http::get($url);

        if (!$response->ok()) {
            return null;
        }

        $transformer = ImporterFactory::make($source);
        $data = $transformer->transform($response->json());

        $exists = Post::where('source', $source)
            ->where('external_id', $data['external_id'])
            ->exists();

        if ($exists) {
            return null;
        }

        return Post::create([
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => 'draft',
            'source' => $source,
            'external_id' => $data['external_id'],
            'meta' => $data['meta'],
            'user_id' => $user_id
        ]);
    }

    private function randomUrl(string $source): array
    {
        return match ($source) {
            'jsonplaceholder' => [
                'https://jsonplaceholder.typicode.com/posts/' . ($id = rand(1, 100)),
                $id,
            ],
            'fakestore' => [
                'https://fakestoreapi.com/products/' . ($id = rand(1, 20)),
                $id,
            ],
            default => throw new \InvalidArgumentException("Unknown source: {$source}"),
        };
    }
}
