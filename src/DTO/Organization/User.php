<?php

namespace AgroZamin\Integration\BusinessId\DTO\Organization;

use AgroZamin\Integration\DTO;

class User extends DTO {
    public int $id;
    public string|null $f_name;
    public string|null $l_name = null;
    public string|null $pinfl = null;
    public string $phone;
    public string|null $photo;

    /**
     * @return array[]
     */
    protected function properties(): array {
        return [
            'fName' => [fn(string $fName) => $fName, 'f_name'],
            'lName' => [fn(string $fName) => $fName, 'l_name'],
        ];
    }
}