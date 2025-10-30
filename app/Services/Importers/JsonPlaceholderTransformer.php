<?php

namespace App\Services\Importers;

class JsonPlaceholderTransformer implements TransformerInterface
{
    public function transform(array $payload): array
    {
        return [
            'title' => $payload['title'] ?? 'Untitled',
            'content' => $payload['body'] ?? '',
            'external_id' => (string)($payload['id'] ?? ''),
            'meta' => $payload,
        ];
    }
}
