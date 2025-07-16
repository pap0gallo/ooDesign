<?php

namespace App\L10\src;

require __DIR__ . '/../../../vendor/autoload.php';

class Normalizer
{
    private $collection;

    public function __construct(array $raw)
    {
        $this->collection = collect($raw);
    }

    public function normalize()
    {
        return new self($this->collection->map(function ($item) {
            return [
                'name' => trim(strtolower($item['name'])),
                'country' => trim(strtolower($item['country'])),
            ];
        })->groupBy('country')
            ->map(function ($items) {
                return collect($items)
                    ->pluck('name')
                    ->unique()
                    ->sort()
                    ->values()
                    ->all();
            })
            ->sortKeys()
            ->all());
    }

    public function toArray()
    {
        return $this->collection->all();
    }
}
