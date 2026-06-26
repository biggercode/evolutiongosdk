<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class CommunityService extends BaseEndpoint
{
    public function add(array $data): array
    {
        return $this->post('community/add', $data);
    }

    public function create(array $data): array
    {
        return $this->post('community/create', $data);
    }

    public function remove(array $data): array
    {
        return $this->post('community/remove', $data);
    }
}
