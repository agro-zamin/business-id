<?php

namespace AgroZamin\Integration\BusinessId\DTO\organization;

use AgroZamin\Integration\DTO;

class Account extends DTO {
    public string $id;
    public bool $is_main;
    public string $number;
    public Bank $bank;

    /**
     * @return array[]
     */
    protected function properties(): array {
        return [
            'bank' => [Bank::class, 'bank']
        ];
    }
}