<?php

namespace KickAss\MageSDK\V1\Directory;

use KickAss\MageSDK\Api\Client;
use KickAss\MageSDK\V1\AbstractEndpoint;

/**
 * Magento V1 directoryCurrencyInformationAcquirerV1 API
 *
 * @package KickAss\MageSDK
 */
class Currency extends AbstractEndpoint
{
    protected $path = 'directory/currency';

    public function getStoreCurrencyInformation():CurrencyObject
    {
        $client = new Client($this->getConfig(), 'GET', $this->getPath(), [], []);
        $response = $client->executeCall();

        return new CurrencyObject($response['body']);
    }
}
