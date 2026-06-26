<?php

namespace Biggercode\EvolutionGoSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Biggercode\EvolutionGoSdk\Endpoints\InstanceService;
use Biggercode\EvolutionGoSdk\Endpoints\SendMessageService;
use Biggercode\EvolutionGoSdk\Endpoints\MessageService;
use Biggercode\EvolutionGoSdk\Endpoints\GroupService;
use Biggercode\EvolutionGoSdk\Endpoints\UserService;
use Biggercode\EvolutionGoSdk\Endpoints\CallService;
use Biggercode\EvolutionGoSdk\Endpoints\ChatService;
use Biggercode\EvolutionGoSdk\Endpoints\CommunityService;
use Biggercode\EvolutionGoSdk\Endpoints\LabelService;
use Biggercode\EvolutionGoSdk\Endpoints\NewsletterService;
use Biggercode\EvolutionGoSdk\Endpoints\PollsService;

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

    public function call(): CallService
    {
        return new CallService($this);
    }

    public function chat(): ChatService
    {
        return new ChatService($this);
    }

    public function community(): CommunityService
    {
        return new CommunityService($this);
    }

    public function label(): LabelService
    {
        return new LabelService($this);
    }

    public function newsletter(): NewsletterService
    {
        return new NewsletterService($this);
    }

    public function polls(): PollsService
    {
        return new PollsService($this);
    }

    /**
     * Helper to parse incoming webhooks and dispatch WebSocket broadcasts.
     *
     * @param array $payload The webhook payload received from EvolutionGo.
     * @return void
     */
    public function handleWebhook(array $payload): void
    {
        if (config('evolutiongosdk.broadcasting.enabled', false)) {
            $eventName = $payload['event'] ?? 'unknown';
            $instanceName = $payload['instance'] ?? null;
            
            event(new \Biggercode\EvolutionGoSdk\Events\EvolutionWebhookReceived($eventName, $payload, $instanceName));
        }
    }
}
