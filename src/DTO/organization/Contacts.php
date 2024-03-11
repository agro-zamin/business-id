<?php

namespace AgroZamin\Integrations\BusinessId\DTO\organization;

use AgroZamin\Integrations\DTO;

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