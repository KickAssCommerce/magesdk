<?php

namespace Sandermangel\MageSDK\V1\Directory;

use Sandermangel\MageSDK\Api\Client;
use Sandermangel\MageSDK\V1\AbstractEndpoint;

/**
 * Magento V1 directoryCurrencyInformationAcquirerV1 API
 *
 * @package Sandermangel\MageSDK
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