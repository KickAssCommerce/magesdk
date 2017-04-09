<?php

namespace Sandermangel\MageSDK\V1\Integration;

use Sandermangel\MageSDK\Api\ApiException;
use Sandermangel\MageSDK\Api\Client;
use Sandermangel\MageSDK\V1\AbstractEndpoint;

/**
 * Magento V1 integrationAdminTokenServiceV1 API
 *
 * @package Sandermangel\MageSDK
 */
class AdminToken extends AbstractEndpoint
{
    protected $path = 'integration/admin/token';

    /**
     * @param string $username
     * @param string $password
     * @return string
     * @throws ApiException
     */
    public function retrieve(string $username, string $password):string
    {
        $client = new Client($this->getConfig(), 'POST', $this->getPath(), json_encode([
            'username' => $username,
            'password' => $password
        ]), []);

        return $client->executeCall()['body'];
    }
}
