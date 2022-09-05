<?php

namespace Services\String\Providers;

interface StringProviderInterface
{
    public function parseString(string $data): array;
    public function getTop(array $data): array;
    public function getCount(array $data): int;
    public function getCountSymbols(string $data, bool $spaceCheck): int;
}
