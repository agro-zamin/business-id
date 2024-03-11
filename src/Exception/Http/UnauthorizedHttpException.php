<?php

namespace AgroZamin\Integrations\BusinessId\Exception\Http;

use Exception;

class UnauthorizedHttpException extends Exception {
    /**
     * @return string
     */
    public function getName(): string {
        return get_class($this);
    }
}