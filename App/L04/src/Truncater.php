<?php

namespace App\L04\src;

require __DIR__ . '/../../../vendor/autoload.php';

class Truncater
{
    const OPTIONS = [
        'separator' => '...',
        'length' => 200,
    ];
    private string $separator;
    private int $length;

    public function __construct($options = [])
    {
        $prepared = self::prepareOptions($options);
        $this->separator = $prepared['separator'];
        $this->length = $prepared['length'];
    }

    public function truncate($text, $options = [])
    {
        $prepared = self::prepareOptions($options + [
                'separator' => $this->separator,
                'length' => $this->length,
            ]);

        return strlen($text) > $prepared['length']
            ? substr($text, 0, $prepared['length']) . $prepared['separator']
            : $text;
    }

    private static function prepareOptions(array $options): array
    {
        $prepared = self::OPTIONS;

        if (isset($options['separator']) && is_string($options['separator'])) {
            $prepared['separator'] = $options['separator'];
        }

        if (isset($options['length']) && is_numeric($options['length'])) {
            $prepared['length'] = abs((int)$options['length']);
        }

        return $prepared;
    }
}
