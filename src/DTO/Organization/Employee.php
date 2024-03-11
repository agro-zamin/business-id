<?php

namespace AgroZamin\Integration\BusinessId\DTO\Organization;

use AgroZamin\Integration\DTO;

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