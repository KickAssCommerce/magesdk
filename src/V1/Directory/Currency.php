<?php

namespace KickAss\MageSDK\V1\Directory;

use KickAss\MageSDK\Api\Client;
use KickAss\MageSDK\V1\AbstractEndpoint;

/**
 * Magento V1 directoryCurrencyInformationAcquirerV1 API
 *
 * @package KickAss\MageSDK
 */
class Currency extends AbstractEndpoint implements CurrencyInterface
{
    protected $path = 'directory/currency';

    /**
     * @return CurrencyObjectInterface
     * @throws \KickAss\MageSDK\Api\ApiException
     */
    public function getStoreCurrencyInformation():CurrencyObjectInterface
    {
        $client = new Client($this->getConfig(), 'GET', $this->getPath(), [], []);
        $response = $client->executeCall();

        return new CurrencyObject($response['body']);
    }
}
