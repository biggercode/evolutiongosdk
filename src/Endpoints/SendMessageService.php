<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class SendMessageService extends BaseEndpoint
{
    public function text(string $instance, array $data): array
    {
        return $this->post('send/text', array_merge([
            'instance' => $instance,
        ], $data));
    }

    public function media(string $instance, array $data): array
    {
        return $this->post('send/media', array_merge([
            'instance' => $instance,
        ], $data));
    }

    public function list(array $data): array
    {
        return $this->post('send/list', $data);
    }

    public function button(array $data): array
    {
        return $this->post('send/button', $data);
    }

    public function poll(array $data): array
    {
        return $this->post('send/poll', $data);
    }

    public function sticker(array $data): array
    {
        return $this->post('send/sticker', $data);
    }

    public function contact(array $data): array
    {
        return $this->post('send/contact', $data);
    }

    public function location(array $data): array
    {
        return $this->post('send/location', $data);
    }

    public function link(array $data): array
    {
        return $this->post('send/link', $data);
    }

    public function carousel(array $data): array
    {
        return $this->post('send/carousel', $data);
    }
}
