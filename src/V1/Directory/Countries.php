<?php

namespace Sandermangel\MageSDK\V1\Directory;

use Sandermangel\MageSDK\Api\Client;
use Sandermangel\MageSDK\V1\AbstractEndpoint;

/**
 * Magento V1 directoryCountryInformationAcquirer API
 *
 * @package Sandermangel\MageSDK
 */
class Countries extends AbstractEndpoint
{
    protected $path = 'directory/countries';

    public function getAll():array
    {
        $client = new Client($this->getConfig(), 'GET', $this->getPath(), [], []);
        $response = $client->executeCall();

        return array_map(function($data) {
            return new CountryObject($data);
        }, $response['body']);
    }

    public function getById(string $id):CountryObject
    {
        $client = new Client($this->getConfig(), 'GET', $this->getPath() . '/' . $id, [], []);
        $response = $client->executeCall();

        return new CountryObject($response['body']);
    }
}