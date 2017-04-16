<?php

namespace KickAss\MageSDK\V1;

use KickAss\MageSDK\Api\Client;
use KickAss\MageSDK\Api\ApiException;

/**
 * Magento V1 storeStoreConfigManagerV1 API
 *
 * @package KickAss\MageSDK
 */
class Store extends AbstractEndpoint implements StoreInterface
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
