<?php

namespace Biggercode\EvolutionGoSdk\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EvolutionWebhookReceived implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $eventName;
    public array $payload;
    public string $instanceName;

    /**
     * Create a new event instance.
     *
     * @param string $eventName The Evolution API event (e.g., 'messages.upsert')
     * @param array $payload The raw webhook payload
     * @param string|null $instanceName The instance name if available
     */
    public function __construct(string $eventName, array $payload, ?string $instanceName = null)
    {
        $this->eventName = $eventName;
        $this->payload = $payload;
        $this->instanceName = $instanceName ?? ($payload['instance'] ?? 'global');
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $channelName = config('evolutiongosdk.broadcasting.channel', 'evolution-channel');
        
        // We can broadcast on a global channel or an instance-specific channel
        return [
            new Channel($channelName),
            new Channel($channelName . '.' . $this->instanceName)
        ];
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return $this->eventName;
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return [
            'event' => $this->eventName,
            'instance' => $this->instanceName,
            'data' => $this->payload,
        ];
    }
}
