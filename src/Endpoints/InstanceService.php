<?php

namespace Biggercode\EvolutionGoSdk\Endpoints;

class InstanceService extends BaseEndpoint
{
    public function getAdvancedSettings(string $instanceId): array
    {
        return $this->get("instance/{$instanceId}/advanced-settings");
    }

    public function updateAdvancedSettings(string $instanceId, array $settings): array
    {
        return $this->put("instance/{$instanceId}/advanced-settings", $settings);
    }

    public function getAll(): array
    {
        return $this->get('instance/all');
    }

    public function connect(array $data): array
    {
        return $this->post('instance/connect', $data);
    }

    public function create(array $data): array
    {
        return $this->post('instance/create', $data);
    }

    public function deleteInstance(string $instanceId): array
    {
        return parent::delete("instance/delete/{$instanceId}");
    }

    public function disconnect(): array
    {
        return $this->post('instance/disconnect');
    }

    public function forceReconnect(string $instanceId, array $data = []): array
    {
        return $this->post("instance/forcereconnect/{$instanceId}", $data);
    }

    public function fetch(string $instanceId): array
    {
        return parent::get("instance/get/{$instanceId}");
    }

    public function logout(?string $instanceId = null): array
    {
        $path = $instanceId ? "instance/logout/{$instanceId}" : 'instance/logout';
        return parent::delete($path);
    }

    public function pair(array $data): array
    {
        return $this->post('instance/pair', $data);
    }

    public function deleteProxy(string $instanceId): array
    {
        return parent::delete("instance/proxy/{$instanceId}");
    }

    public function setProxy(string $instanceId, array $data): array
    {
        return $this->post("instance/proxy/{$instanceId}", $data);
    }

    public function qr(array $query = []): array
    {
        return parent::get('instance/qr', $query);
    }

    public function reconnect(): array
    {
        return $this->post('instance/reconnect');
    }

    public function status(array $query = []): array
    {
        return parent::get('instance/status', $query);
    }
}
