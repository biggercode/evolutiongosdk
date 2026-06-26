<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class UserService extends BaseEndpoint
{
    public function check(array $data): array
    {
        return $this->post('user/check', $data);
    }

    public function info(array $data): array
    {
        return $this->post('user/info', $data);
    }

    public function avatar(array $data): array
    {
        return $this->post('user/avatar', $data);
    }

    public function contacts(): array
    {
        return $this->get('user/contacts');
    }

    public function privacy(array $data = []): array
    {
        if (empty($data)) {
            return $this->get('user/privacy');
        }
        return $this->post('user/privacy', $data);
    }
}
