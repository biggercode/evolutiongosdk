<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class MessageService extends BaseEndpoint
{
    public function react(array $data): array
    {
        return $this->post('message/react', $data);
    }

    public function markRead(array $data): array
    {
        return $this->post('message/markread', $data);
    }

    public function delete(array $data): array
    {
        return $this->post('message/delete', $data);
    }

    public function edit(array $data): array
    {
        return $this->post('message/edit', $data);
    }

    public function presence(array $data): array
    {
        return $this->post('message/presence', $data);
    }

    public function status(array $data): array
    {
        return $this->post('message/status', $data);
    }
}
