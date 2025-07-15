<?php

namespace App\L08\src\testFunc;

require __DIR__ . '/../../../vendor/autoload.php';

use App\L08\src\DeckOfCards;


$deck = new DeckOfCards([2, 3]);

$deck->getShuffled();
$deck->getShuffled();

var_dump($deck->getShuffled());