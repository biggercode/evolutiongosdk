<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class GroupService extends BaseEndpoint
{
    public function create(array $data): array
    {
        return $this->post('group/create', $data);
    }

    public function participant(array $data): array
    {
        return $this->post('group/participant', $data);
    }

    public function info(array $data): array
    {
        return $this->post('group/info', $data);
    }

    public function list(): array
    {
        return $this->get('group/list');
    }
}
