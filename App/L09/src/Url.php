<?php

namespace App\L09\src;

require __DIR__ . '/../../../vendor/autoload.php';

$url = 'http://yandex.ru:80?key=value&key2=value2';

class Url
{
    private array $url;
    private array $queryParams;

    public function __construct(string $url)
    {
        $this->url = parse_url($url);
        $this->queryParams = [];

        if (isset($this->url['query'])) {
            parse_str($this->url['query'], $this->queryParams);
        }
    }

    public function getScheme(): string
    {
        return $this->url['scheme'];
    }

    public function getHostName(): string
    {
        return $this->url['host'];
    }

    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    public function getQueryParam($key, $default = null)
    {
        return $this->queryParams[$key] ?? $default;
    }

    public function equals(self $obj): bool
    {
        return $this == $obj;
    }
}
