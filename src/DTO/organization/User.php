<?php

namespace AgroZamin\Integrations\BusinessId\DTO\organization;

use AgroZamin\Integrations\DTO;

class User extends DTO {
    public int $id;
    public string|null $f_name;
    public string|null $l_name = null;
    public string|null $pinfl = null;
    public string $phone;
    public string|null $photo;
}