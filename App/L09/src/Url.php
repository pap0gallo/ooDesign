<?php

namespace App\L09\src;

require __DIR__ . '/../../../vendor/autoload.php';

$url = 'http://yandex.ru:80?key=value&key2=value2';

class Url
{
    private $parser;

    public function __construct(string $url)
    {
        $this->parser = new Parser($url);
    }


    public function getScheme(): string
    {
        return $this->parser->getScheme();
    }

    public function getHostName(): string
    {
        return $this->parser->getHostName();
    }

    public function getParams(): array
    {
        return $this->parser->getParams();
    }

    public function getParam($key, $default = null)
    {
        return $this->parser->getParam($key, $default);
    }

    public function equals(self $obj): bool
    {
        return $this->parser->equals($obj->parser);
    }
}
