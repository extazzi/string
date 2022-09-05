<?php

namespace Services\String;

use Services\String\Providers\StringProviderInterface;

class StringService
{
    private $stringProvider;

    public function __construct(StringProviderInterface $stringProvider)
    {
        $this->stringProvider = $stringProvider;
    }

    public function parseString(string $data): array
    {
        return $this->stringProvider->parseString($data);
    }

    public function getTop(array $data): array
    {
        return $this->stringProvider->getTop($data);
    }

    public function getCount(array $data): int
    {
        return $this->stringProvider->getCount($data);
    }

    public function getCountSymbols(string $data, bool $spaceCheck = false): int
    {
        return $this->stringProvider->getCountSymbols($data, $spaceCheck);
    }
}