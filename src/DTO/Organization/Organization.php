<?php

namespace AgroZamin\Integration\BusinessId\DTO\Organization;

use AgroZamin\Integration\BusinessId\DTO\Service\Connection;
use AgroZamin\Integration\DTO;

/**
 * @property Account[] $accounts
 */
class Organization extends DTO {
    public string $id;
    public int $businessId;
    public int $tin;
    public string $name;
    public string $address;
    public Logo|null $logo;
    public Contacts $contacts;
    public Connection $connection;
    public string $createTime;
    public string $lastUpdateTime;

    /**
     * @return array[]
     */
    protected function properties(): array {
        return [
            'logo' => [Logo::class, 'logo'],
            'contacts' => [Contacts::class, 'contacts'],
            'connection' => [Connection::class, 'connection'],
            //
            'businessId' => [fn(int $businessId) => $businessId, 'business_id'],
            'createTime' => [fn(string $time) => $time, 'create_time'],
            'lastUpdateTime' => [fn(string $time) => $time, 'last_update_time'],
        ];
    }
}