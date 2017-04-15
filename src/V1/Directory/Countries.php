<?php

namespace KickAss\MageSDK\V1\Directory;

use KickAss\MageSDK\Api\Client;
use KickAss\MageSDK\V1\AbstractEndpoint;

/**
 * Magento V1 directoryCountryInformationAcquirer API
 *
 * @package KickAss\MageSDK
 */
class Countries extends AbstractEndpoint
{
    protected $path = 'directory/countries';

    public function getAll():array
    {
        $client = new Client($this->getConfig(), 'GET', $this->getPath(), [], []);
        $response = $client->executeCall();

        return array_map(function ($data) {
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
