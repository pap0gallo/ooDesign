<?php

namespace App\L04\src;

require __DIR__ . '/../../../vendor/autoload.php';

class Truncater
{
    const array DEFAULT_OPTIONS = [
        'separator' => '...',
        'length' => 200,
    ];
    private array $options;

    public function __construct(array $options = [])
    {
        $this->options =  self::prepareOptions($options);
    }

    public function truncate(string $text, array $options = []): string
    {

        $prepared = self::prepareOptions(array_merge($this->options, $options));

        return mb_strlen($text) > $prepared['length']
            ? mb_substr($text, 0, $prepared['length']) . $prepared['separator']
            : $text;
    }

    private static function prepareOptions(array $options): array
    {
        $filtered = [];

        if (isset($options['separator']) && is_string($options['separator'])) {
            $filtered['separator'] = $options['separator'];
        }

        if (isset($options['length']) && is_numeric($options['length'])) {
            $filtered['length'] = abs((int)$options['length']);
        }
        return array_merge(self::DEFAULT_OPTIONS, array_intersect_key($filtered, self::DEFAULT_OPTIONS));
    }
}
