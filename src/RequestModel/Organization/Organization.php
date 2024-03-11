<?php

namespace AgroZamin\Integration\BusinessId\RequestModel\Organization;

use AgroZamin\Integration\BusinessId\DTO\organization\Organization as OrganizationDTO;
use AgroZamin\Integration\RequestModel;

class Organization extends RequestModel {
    public const SOURCE_DEFAULT = 'default';
    public const SOURCE_SERVICE = 'service';

    private string $_source;
    private array $_queryParams = [];

    /**
     * @param string $source
     */
    public function __construct(string $source = self::SOURCE_DEFAULT) {
        $this->_source = $source;
    }

    /**
     * @return Organization
     */
    public static function service(): Organization {
        return new self(self::SOURCE_SERVICE);
    }

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
        return match ($this->_source) {
            self::SOURCE_DEFAULT => '/core/organization/organization/info',
            self::SOURCE_SERVICE => '/core/service/organization/info'
        };
    }

    /**
     * @param array $data
     *
     * @return OrganizationDTO
     */
    public function buildDto(array $data): OrganizationDTO {
        return new OrganizationDTO($data['body']['Organization']);
    }

    /**
     * @return array
     */
    public function queryParams(): array {
        return $this->_queryParams;
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
     * @param int $businessId
     *
     * @return $this
     */
    public function byBusinessId(int $businessId): static {
        $this->_queryParams['business_id'] = $businessId;
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
}