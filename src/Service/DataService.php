<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class DataService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function fetchData(): array
    {
        $response = $this->client->request(
            'GET',
            'http://127.0.0.1:7080/api/data'
        );
        $content = $response->toArray();

        return $content;
    }
}
