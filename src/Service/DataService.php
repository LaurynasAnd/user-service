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

        // $statusCode = $response->getStatusCode();
        // $statusCode = 200
        // $contentType = $response->getHeaders()['content-type'][0];
        // $contentType = 'application/json'
        // $content = $response->getContent();
        // $content = '{"id":521583, "name":"symfony-docs", ...}'
        $content = $response->toArray();
        // $content = ['id' => 521583, 'name' => 'symfony-docs', ...]

        return $content;
    }
}
