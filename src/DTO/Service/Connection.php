<?php

namespace AgroZamin\Integration\BusinessId\DTO\Service;

use AgroZamin\Integration\BusinessId\DTO\Organization\Account;
use AgroZamin\Integration\DTO;
use function is_null;

class Connection extends DTO {
    public Service $service;
    public Account $account;
    public int $status;
    public bool $isConnected;
    public string $connectedTime;
    public string $lastUpdateTime;

    /**
     * @return array[]
     */
    protected function properties(): array {
        return [
            'service' => [Service::class, 'service'],
            'account' => [Account::class, 'account'],
            'isConnected' => [fn(bool $isConnected) => $isConnected, 'is_connected'],
            'connectedTime' => [fn(string $time) => $time, 'connected_time'],
            'lastUpdateTime' => [fn(string $time) => $time, 'last_update_time']
        ];
    }

    /**
     * @param array|null $data
     *
     * @return Connection|null
     */
    public static function build(array|null $data): Connection|null {
        if (is_null($data)) {
            return null;
        }

        return new self($data);
    }
}