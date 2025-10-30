<?php

namespace App\Services\Importers;

class FakeStoreTransformer implements TransformerInterface
{
    public function transform(array $payload): array
    {
        $title = $payload['title'] ?? 'Untitled product';
        $description = $payload['description'] ?? '';
        $price = $payload['price'] ?? 'N/A';
        $content = $description . "\n\nPrice: " . $price;

        return [
            'title' => $title,
            'content' => $content,
            'external_id' => (string)($payload['id'] ?? ''),
            'meta' => $payload,
        ];
    }
}
