<?php

namespace KickAss\MageSDK\V1\Integration;

use KickAss\MageSDK\Api\ApiException;

/**
 * Magento V1 integrationCustomerTokenServiceV1 API
 *
 * @package KickAss\MageSDK
 */
interface CustomerTokenInterface
{
    /**
     * @param string $username
     * @param string $password
     * @return string
     * @throws ApiException
     */
    public function retrieve(string $username, string $password) : string;
}