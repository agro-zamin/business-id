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
}