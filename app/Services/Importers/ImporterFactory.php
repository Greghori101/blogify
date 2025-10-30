<?php

namespace App\Services\Importers;

use InvalidArgumentException;

class ImporterFactory
{
    public static function make(string $source): TransformerInterface
    {
        return match($source) {
            'jsonplaceholder' => new JsonPlaceholderTransformer(),
            'fakestore' => new FakeStoreTransformer(),
            default => throw new InvalidArgumentException("Unknown source: {$source}"),
        };
    }
}
