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
    public function block(array $data): array
    {
        return $this->post('user/block', $data);
    }

    public function blockList(): array
    {
        return $this->get('user/blocklist');
    }

    public function profileName(array $data): array
    {
        return $this->post('user/profileName', $data);
    }

    public function profilePicture(array $data): array
    {
        return $this->post('user/profilePicture', $data);
    }

    public function profileStatus(array $data): array
    {
        return $this->post('user/profileStatus', $data);
    }

    public function unblock(array $data): array
    {
        return $this->post('user/unblock', $data);
    }
}
