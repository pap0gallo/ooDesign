<?php

namespace App\L08\src;

require __DIR__ . '/../../../vendor/autoload.php';

class DeckOfCards
{
    private $deck;
    private const array ALLOWED_CARDS =
        [2, 3, 4, 5, 6, 7, 8, 9, 10, "jack", "lady", "king", "ace", "joker"];

    public function __construct(array $deck)
    {
        $collection = collect($deck)->unique();

        $invalidCards = $collection->reject(fn($value) => in_array($value, self::ALLOWED_CARDS));

        if ($invalidCards->isNotEmpty()) {
            throw new InvalidArgumentException(
                'Недопустимые карты: ' . implode(', ', $invalidCards->all())
            );
        }

        $this->deck = $collection
            ->map(fn($value) => array_fill(0, 4, $value))
            ->flatten();
    }

    public function getShuffled(): array
    {
        return $this->deck->shuffle()->all();
    }
}
