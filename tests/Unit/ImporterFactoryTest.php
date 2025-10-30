<?php

use App\Services\Importers\ImporterFactory;
use App\Services\Importers\JsonPlaceholderTransformer;
use App\Services\Importers\FakeStoreTransformer;

it('creates the correct transformer instance for each source', function () {
    expect(ImporterFactory::make('jsonplaceholder'))->toBeInstanceOf(JsonPlaceholderTransformer::class)
        ->and(ImporterFactory::make('fakestore'))->toBeInstanceOf(FakeStoreTransformer::class);
});

it('throws exception for unknown source', function () {
    expect(fn () => ImporterFactory::make('invalid'))
        ->toThrow(InvalidArgumentException::class);
});
