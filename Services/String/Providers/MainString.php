<?php

namespace Services\String\Providers;

class MainString implements StringProviderInterface
{
    public function parseString(string $data): array
    {
        return explode(' ', $data);
    }

    public function getTop(array $data): array
    {
        $sortArray = $this->sort($data);

        return array_slice($sortArray, 0, 5, true);
    }

    public function getCount(array $data): int
    {
        return count(array_filter($data, function($x) { return $x !== ""; }));
    }

    public function getCountSymbols(string $data, bool $spaceCheck = false): int
    {
        if ($spaceCheck) {
            $data = str_replace(' ', '', $data);
        }

        return mb_strlen($data);
    }

    private function sort(array $data): array
    {

        $cntArray = [];
        for ($i = 0; $i < count($data); $i++) {
            if (!empty($data[$i])) {
                $cntArray[$data[$i]] = isset($cntArray[$data[$i]]) ? $cntArray[$data[$i]] + 1 : 1;
            }
        }
        arsort($cntArray, SORT_NUMERIC);

        uksort($cntArray, function ($x, $y) use ($cntArray) {
            if ($cntArray[$x] == $cntArray[$y]) {
                return strcasecmp($x, $y);
            }

            return $cntArray[$y]-$cntArray[$x];
        });

        return $cntArray;
    }
}