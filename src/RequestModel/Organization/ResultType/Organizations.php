<?php

namespace AgroZamin\Integration\BusinessId\RequestModel\Organization\ResultType;

use AgroZamin\Integration\BusinessId\DTO\organization\Organization;
use AgroZamin\Integration\RequestModel;

class Organizations extends RequestModel {
    private string $_source = 'ids';
    private mixed $_value;

    public function requestMethod(): string {
        return 'GET';
    }

    public function requestOption(): string {
        return '';
    }

    /**
     * @return string
     */
    public function url(): string {
        return '/core/organizations';
    }

    /**
     * @return string
     */
    public function dto(): string {
        return Organization::class;
    }

    /**
     * @return array
     */
    public function queryParams(): array {
        $params = [];

        if (isset($this->_value)) {
            $params[$this->_source] = $this->_value;
        }

        return $params;
    }

    /**
     * @param string $source
     * @param string|int $value
     *
     * @return $this
     */
    public function by(mixed $value, string $source = 'ids'): static {
        $this->_value = $value;
        $this->_source = $source;

        return $this;
    }
}