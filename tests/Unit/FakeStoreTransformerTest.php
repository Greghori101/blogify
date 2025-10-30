<?php

use App\Services\Importers\FakeStoreTransformer;

it('transforms FakeStore payload correctly', function () {
    $payload = [
        'id' => 42,
        'title' => 'Example Product',
        'description' => 'Product description text',
        'price' => 59.99,
    ];

    $data = (new FakeStoreTransformer())->transform($payload);

    expect($data)
        ->toHaveKeys(['title', 'content', 'external_id', 'meta'])
        ->and($data['title'])->toBe('Example Product')
        ->and($data['content'])->toContain('Product description text')
        ->and($data['content'])->toContain('Price: 59.99')
        ->and($data['external_id'])->toBe('42')
        ->and($data['meta'])->toBe($payload);
});

it('handles missing fields gracefully in FakeStoreTransformer', function () {
    $data = (new FakeStoreTransformer())->transform([]);

    expect($data['title'])->toBe('Untitled product')
        ->and($data['content'])->toContain('Price: N/A')
        ->and($data['external_id'])->toBe('');
});
