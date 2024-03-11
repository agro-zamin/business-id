<?php

namespace AgroZamin\Integrations\BusinessId\Trait;

use AgroZamin\Integrations\BusinessId\DTO\organization\Organization;
use AgroZamin\Integrations\BusinessId\RequestModel\Organization\OrganizationRequestModel;
use GuzzleHttp\Exception\GuzzleException;
use Throwable;

trait OrganizationTrait {
    /**
     * @param string $id
     *
     * @return Organization
     * @throws GuzzleException
     * @throws Throwable
     */
    public function getOrganizationById(string $id): Organization {
        /** @var Organization $responseDto */
        $responseDto = $this->requestModel(OrganizationRequestModel::one()->by($id))->sendRequest();
        return $responseDto;
    }

    /**
     * @param array $ids
     *
     * @return array
     * @throws GuzzleException
     * @throws Throwable
     */
    public function getOrganizationsByIds(array $ids): array {
        /** @var array $organizations */
        $organizations = $this->requestModel(OrganizationRequestModel::some()->by($ids))->sendRequest();
        return $organizations;
    }
}