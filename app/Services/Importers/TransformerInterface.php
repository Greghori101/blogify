<?php

namespace App\Services\Importers;

interface TransformerInterface
{
    public function transform(array $payload): array;
}
