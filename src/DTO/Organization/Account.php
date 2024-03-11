<?php

namespace AgroZamin\Integration\BusinessId\DTO\Organization;

use AgroZamin\Integration\DTO;

class Account extends DTO {
    public string $id;
    public bool $isMain;
    public string $number;
    public Bank $bank;

    /**
     * @return array[]
     */
    protected function properties(): array {
        return [
            'isMain' => [fn(bool $isMain) => $isMain, 'is_main'],
            'bank' => [Bank::class, 'bank']
        ];
    }
}