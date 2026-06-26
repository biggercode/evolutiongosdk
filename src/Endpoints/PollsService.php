<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class PollsService extends BaseEndpoint
{
    public function results(string $pollMessageId): array
    {
        return $this->get("polls/{$pollMessageId}/results");
    }
}
