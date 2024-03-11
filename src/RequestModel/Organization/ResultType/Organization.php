<?php

namespace AgroZamin\Integration\BusinessId\RequestModel\Organization\ResultType;

use AgroZamin\Integration\BusinessId\DTO\organization\Organization as OrganizationDTO;
use AgroZamin\Integration\RequestModel;

class Organization extends RequestModel {
    private array $_queryParams = [];

    /**
     * @return string
     */
    public function requestMethod(): string {
        return 'GET';
    }

    /**
     * @return string
     */
    public function url(): string {
        return '/core/organization/organization/info';
    }

    /**
     * @param string $id
     *
     * @return $this
     */
    public function byId(string $id): static {
        $this->_queryParams['id'] = $id;
        return $this;
    }

    /**
     * @param int $tin
     *
     * @return $this
     */
    public function byTin(int $tin): static {
        $this->_queryParams['tin'] = $tin;
        return $this;
    }

    /**
     * @return array
     */
    public function queryParams(): array {
        return $this->_queryParams;
    }

    /**
     * @param array $data
     *
     * @return OrganizationDTO
     */
    public function buildDto(array $data): OrganizationDTO {
        return new OrganizationDTO($data['body']['Organization']);
    }
}