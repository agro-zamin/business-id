<?php

namespace AgroZamin\Integration\BusinessId\Exception\Http;

use Exception;

class NotFoundHttpException extends Exception {
    /**
     * @return string
     */
    public function getName(): string {
        return get_class($this);
    }
}