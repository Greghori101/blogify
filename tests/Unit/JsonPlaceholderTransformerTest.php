<?php

use App\Services\Importers\JsonPlaceholderTransformer;

it('transforms JsonPlaceholder payload correctly', function () {
    $payload = [
        'id' => 7,
        'title' => 'Sample Post',
        'body' => 'Post body content',
    ];

    $data = (new JsonPlaceholderTransformer())->transform($payload);

    expect($data)
        ->toHaveKeys(['title', 'content', 'external_id', 'meta'])
        ->and($data['title'])->toBe('Sample Post')
        ->and($data['content'])->toBe('Post body content')
        ->and($data['external_id'])->toBe('7')
        ->and($data['meta'])->toBe($payload);
});

it('handles missing fields gracefully in JsonPlaceholderTransformer', function () {
    $data = (new JsonPlaceholderTransformer())->transform([]);

    expect($data['title'])->toBe('Untitled')
        ->and($data['content'])->toBe('')
        ->and($data['external_id'])->toBe('');
});
