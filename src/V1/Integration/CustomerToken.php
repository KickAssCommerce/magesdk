<?php

namespace Sandermangel\MageSDK\V1\Integration;

use Sandermangel\MageSDK\Api\Client;
use Sandermangel\MageSDK\V1\AbstractEndpoint;

/**
 * Magento V1 integrationCustomerTokenServiceV1 API
 *
 * @package Sandermangel\MageSDK
 */
class CustomerToken extends AbstractEndpoint
{
    protected $path = 'integration/customer/token';

    public function retrieve(string $username, string $password):string
    {
        $client = new Client($this->getConfig(), 'POST', $this->getPath(), json_encode([
            'username' => $username,
            'password' => $password
        ]), []);

        return $client->executeCall()['body'];
    }
}