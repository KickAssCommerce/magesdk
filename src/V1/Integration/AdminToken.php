<?php

namespace KickAss\MageSDK\V1\Integration;

use KickAss\MageSDK\Api\ApiException;
use KickAss\MageSDK\Api\Client;
use KickAss\MageSDK\V1\AbstractEndpoint;

/**
 * Magento V1 integrationAdminTokenServiceV1 API
 *
 * @package KickAss\MageSDK
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
