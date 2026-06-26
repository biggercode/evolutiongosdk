<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

use Biggercode\EvolutionGoSdk\EvolutionGoClient;
use GuzzleHttp\Exception\GuzzleException;

abstract class BaseEndpoint
{
    protected EvolutionGoClient $client;

    public function __construct(EvolutionGoClient $client)
    {
        $this->client = $client;
    }

    /**
     * @throws GuzzleException
     */
    protected function post(string $uri, array $data = []): array
    {
        $response = $this->client->getHttpClient()->post($uri, [
            'json' => $data,
        ]);

        return json_decode($response->getBody()->getContents(), true) ?? [];
    }

    /**
     * @throws GuzzleException
     */
    protected function get(string $uri, array $query = []): array
    {
        $response = $this->client->getHttpClient()->get($uri, [
            'query' => $query,
        ]);

        return json_decode($response->getBody()->getContents(), true) ?? [];
    }
    
    /**
     * @throws GuzzleException
     */
    protected function delete(string $uri, array $data = []): array
    {
        $options = [];
        if (!empty($data)) {
            $options['json'] = $data;
        }
        $response = $this->client->getHttpClient()->delete($uri, $options);

        return json_decode($response->getBody()->getContents(), true) ?? [];
    }

    /**
     * @throws GuzzleException
     */
    protected function put(string $uri, array $data = []): array
    {
        $response = $this->client->getHttpClient()->put($uri, [
            'json' => $data,
        ]);

        return json_decode($response->getBody()->getContents(), true) ?? [];
    }
}
