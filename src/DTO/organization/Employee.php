<?php

namespace AgroZamin\Integrations\BusinessId\DTO\organization;

use AgroZamin\Integrations\DTO;

class Employee extends DTO {
    public string $id;
    public string $position;
    public string $role_id;
    public User $user;

    /**
     * @return array[]
     */
    protected function properties(): array {
        return [
            'user' => [User::class, 'user']
        ];
    }
}