<?php

namespace App\L07\src\Comparator;

use Ds\Stack;

require __DIR__ . '/../../../vendor/autoload.php';

function normalizer($seq)
{
    $stack = new Stack();
    foreach (str_split($seq) as $item) {
        if ($item === '#' && !$stack->isEmpty()) {
            $stack->pop();
        } elseif ($item !== '#') {
            $stack->push($item);
        }
    }
    return $stack->toArray();
}

function compare($seq1, $seq2)
{
    return normalizer($seq1) === normalizer($seq2);
}

var_dump(compare('#c', 'c'));
