<?php

namespace AgroZamin\Integration\BusinessId\RequestModel\Service;

use AgroZamin\Integration\BusinessId\DTO\Service\Service as ServiceDTO;
use AgroZamin\Integration\DTO;
use AgroZamin\Integration\RequestModel;

class Service extends RequestModel {
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
        return '/core/service/service/info';
    }

    /**
     * @param array $data
     *
     * @return DTO
     */
    public function buildDto(array $data): DTO {
        return new ServiceDTO($data['body']['Service']);
    }
}