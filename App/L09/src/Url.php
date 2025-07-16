<?php

namespace App\L09\src;

require __DIR__ . '/../../../vendor/autoload.php';

$url = 'http://yandex.ru:80?key=value&key2=value2';

class Url
{
    private $scheme;
    private $hostName;
    private $queryParams;

    public function __construct(string $url)
    {
        $parts = parse_url($url);

        $this->scheme = $parts['scheme'] ?? '';
        $this->hostName = $parts['host'] ?? '';
        $this->queryParams = [];

        if (!empty($parts['query'])) {
            parse_str($parts['query'], $this->queryParams);
        }
    }

    public function getScheme(): string
    {
        return $this->scheme;
    }

    public function getHostName(): string
    {
        return $this->hostName;
    }

    public function getParams(): array
    {
        return $this->queryParams;
    }

    public function getParam($key, $default = null)
    {
        return $this->queryParams[$key] ?? $default;
    }

    public function equals(self $obj): bool
    {
        return $this->scheme === $obj->getScheme()
            && $this->hostName === $obj->getHostName()
            && $this->queryParams == $obj->getParams();
    }
}
