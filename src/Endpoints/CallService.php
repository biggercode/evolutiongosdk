<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class CallService extends BaseEndpoint
{
    public function reject(array $data): array
    {
        return $this->post('call/reject', $data);
    }
}
