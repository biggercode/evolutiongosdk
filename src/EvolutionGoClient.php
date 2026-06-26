<?php

namespace Biggercode\EvolutionGoSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Biggercode\EvolutionGoSdk\Endpoints\InstanceService;
use Biggercode\EvolutionGoSdk\Endpoints\SendMessageService;
use Biggercode\EvolutionGoSdk\Endpoints\MessageService;
use Biggercode\EvolutionGoSdk\Endpoints\GroupService;
use Biggercode\EvolutionGoSdk\Endpoints\UserService;

class EvolutionGoClient
{
    protected Client $httpClient;
    protected string $baseUrl;
    protected string $apiKey;

    public function __construct(string $baseUrl, string $apiKey, array $guzzleOptions = [])
    {
        $this->baseUrl = rtrim($baseUrl, '/');
        $this->apiKey = $apiKey;

        $options = array_merge([
            'base_uri' => $this->baseUrl . '/',
            'verify' => false,
            'headers' => [
                'apikey' => $this->apiKey,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ], $guzzleOptions);

        $this->httpClient = new Client($options);
    }

    public function getHttpClient(): Client
    {
        return $this->httpClient;
    }

    public function instance(): InstanceService
    {
        return new InstanceService($this);
    }

    public function send(): SendMessageService
    {
        return new SendMessageService($this);
    }

    public function message(): MessageService
    {
        return new MessageService($this);
    }

    public function group(): GroupService
    {
        return new GroupService($this);
    }

    public function user(): UserService
    {
        return new UserService($this);
    }
}
