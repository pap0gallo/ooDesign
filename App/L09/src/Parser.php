<?php

namespace App\L09\src;

require __DIR__ . '/../../../vendor/autoload.php';

class Parser
{
    private string $scheme;
    private string $hostName;
    private array $queryParams;

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

    public function equals(self $other): bool
    {
        return $this->scheme === $other->scheme
            && $this->hostName === $other->hostName
            && $this->queryParams == $other->queryParams;
    }
}
