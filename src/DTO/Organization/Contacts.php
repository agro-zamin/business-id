<?php

namespace AgroZamin\Integration\BusinessId\DTO\Organization;

use AgroZamin\Integration\DTO;

class Contacts extends DTO {
    public string|null $phone = null;
    public string|null $email = null;
}