<?php

namespace AgroZamin\Integrations\BusinessId\RequestModel\Organization;

use AgroZamin\Integrations\BusinessId\RequestModel\Organization\ResultType\Organization as OrganizationResultType;
use AgroZamin\Integrations\BusinessId\RequestModel\Organization\ResultType\Organizations;

class OrganizationRequestModel {
    /**
     * @return OrganizationResultType
     */
    public static function one(): OrganizationResultType {
        return new OrganizationResultType();
    }

    /**
     * @return Organizations
     */
    public static function some(): Organizations {
        return new Organizations();
    }
}