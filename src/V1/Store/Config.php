<?php

namespace Sandermangel\MageSDK\V1\Store;

use Sandermangel\MageSDK\Api\Client;
use Sandermangel\MageSDK\V1\AbstractEndpoint;
use Sandermangel\MageSDK\Api\ApiException;

/**
 * Magento V1 storeStoreConfigManagerV1 API
 *
 * @package Sandermangel\MageSDK
 */
class Config extends AbstractEndpoint implements ConfigInterface
{
    protected $path = 'store/storeConfigs';

    /**
     * @param string $code
     * @return \stdClass
     * @throws ApiException
     */
    public function getByStoreCode(string $code): \stdClass
    {
        $client = new Client($this->getConfig(), 'GET', $this->getPath(), [
            'storeCodes' => [$code]
        ], []);
        $response = $client->executeCall();

        return reset($response['body']);
    }
}