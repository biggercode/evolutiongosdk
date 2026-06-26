<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class InstanceService extends BaseEndpoint
{
    public function create(array $data): array
    {
        return $this->post('instance/create', $data);
    }

    public function connect(array $data): array
    {
        return $this->post('instance/connect', $data);
    }

    public function status(array $query = []): array
    {
        return $this->get('instance/status', $query);
    }

    public function qr(array $query = []): array
    {
        return $this->get('instance/qr', $query);
    }

    public function deleteInstance(string $instanceId): array
    {
        return parent::delete("instance/delete/{$instanceId}");
    }

    public function logout(): array
    {
        return $this->delete('instance/logout');
    }

    public function updateAdvancedSettings(string $instanceId, array $settings): array
    {
        return $this->put("instance/{$instanceId}/advanced-settings", $settings);
    }
}
