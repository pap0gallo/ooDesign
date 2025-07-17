<?php

namespace App\L12\src;

require __DIR__ . '/../../../vendor/autoload.php';

use function Symfony\Component\String\s;

function getQuestions(string $text): string
{
    $coll = collect(s($text)->split("\n"));

    return $coll->map(fn($item) => trim($item))
        ->filter(fn($item) => str_ends_with($item, '?'))
        ->implode("\n");
}


$text = <<<HEREDOC
lala\r\nr
ehu?\t
vie?eii
\n \t
i see you
/r \n
one two?\r\n\n
turum-purum
HEREDOC;


echo getQuestions($text);
