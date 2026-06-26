<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class NewsletterService extends BaseEndpoint
{
    public function create(array $data): array
    {
        return $this->post('newsletter/create', $data);
    }

    public function info(array $data): array
    {
        return $this->post('newsletter/info', $data);
    }

    public function link(array $data): array
    {
        return $this->post('newsletter/link', $data);
    }

    public function list(): array
    {
        return $this->get('newsletter/list');
    }

    public function messages(array $data): array
    {
        return $this->post('newsletter/messages', $data);
    }

    public function subscribe(array $data): array
    {
        return $this->post('newsletter/subscribe', $data);
    }
}
