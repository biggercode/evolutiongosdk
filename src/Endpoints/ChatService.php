<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class ChatService extends BaseEndpoint
{
    public function archive(array $data): array
    {
        return $this->post('chat/archive', $data);
    }

    public function historySyncRequest(array $data): array
    {
        return $this->post('chat/history-sync-request', $data);
    }

    public function mute(array $data): array
    {
        return $this->post('chat/mute', $data);
    }

    public function pin(array $data): array
    {
        return $this->post('chat/pin', $data);
    }

    public function unarchive(array $data): array
    {
        return $this->post('chat/unarchive', $data);
    }

    public function unmute(array $data): array
    {
        return $this->post('chat/unmute', $data);
    }

    public function unpin(array $data): array
    {
        return $this->post('chat/unpin', $data);
    }
}
