<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class LabelService extends BaseEndpoint
{
    public function getAll(): array
    {
        return $this->get('label');
    }

    public function chat(array $data): array
    {
        return $this->post('label/chat', $data);
    }

    public function edit(array $data): array
    {
        return $this->post('label/edit', $data);
    }

    public function message(array $data): array
    {
        return $this->post('label/message', $data);
    }

    public function unlabelChat(array $data): array
    {
        return $this->post('unlabel/chat', $data);
    }

    public function unlabelMessage(array $data): array
    {
        return $this->post('unlabel/message', $data);
    }
}
