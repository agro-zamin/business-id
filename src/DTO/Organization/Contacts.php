<?php

namespace AgroZamin\Integration\BusinessId\DTO\Organization;

use AgroZamin\Integration\DTO;

class Contacts extends DTO {
    public Contact|null $phone = null;
    public Contact|null $email = null;

    /**
     * @return array[]
     */
    protected function properties(): array {
        return [
            'phone' => [Contact::class, 'phone'],
            'email' => [Contact::class, 'email'],
        ];
    }
}