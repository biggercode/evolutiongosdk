<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class GroupService extends BaseEndpoint
{
    public function create(array $data): array
    {
        return $this->post('group/create', $data);
    }

    public function description(array $data): array
    {
        return $this->post('group/description', $data);
    }

    public function info(array $data): array
    {
        return $this->post('group/info', $data);
    }

    public function inviteLink(array $data): array
    {
        return $this->post('group/invitelink', $data);
    }

    public function join(array $data): array
    {
        return $this->post('group/join', $data);
    }

    public function leave(array $data): array
    {
        return $this->post('group/leave', $data);
    }

    public function list(): array
    {
        return $this->get('group/list');
    }

    public function myAll(): array
    {
        return $this->get('group/myall');
    }

    public function name(array $data): array
    {
        return $this->post('group/name', $data);
    }

    public function participant(array $data): array
    {
        return $this->post('group/participant', $data);
    }

    public function photo(array $data): array
    {
        return $this->post('group/photo', $data);
    }
}
