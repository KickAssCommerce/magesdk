<?php

namespace Sandermangel\MageSDK\V1;

use Sandermangel\MageSDK\Api\Client;
use Sandermangel\MageSDK\V1\AbstractEndpoint;

/**
 * Magento V1 catalogProductRepositoryV1 API
 *
 * @package Sandermangel\MageSDK
 */
class Products extends AbstractEndpoint
{
    protected $path = 'products';

    public function getAll():array
    {
        $client = new Client($this->getConfig(), 'GET', $this->getPath(), [], []);
        $response = $client->executeCall();

        return array_map(function($data) {
            return new CountryObject($data);
        }, $response['body']);
    }

    public function getBySku(string $sku)
    {
        $client = new Client($this->getConfig(), 'GET', $this->getPath() . '/' . $sku, [], []);
        $response = $client->executeCall();

        var_dump($response);exit;
    }
}