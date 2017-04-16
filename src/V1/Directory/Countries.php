<?php

namespace KickAss\MageSDK\V1\Directory;

use KickAss\MageSDK\Api\Client;
use KickAss\MageSDK\Objects\Directory\CountryObject;
use KickAss\MageSDK\Objects\Directory\CountryObjectInterface;
use KickAss\MageSDK\V1\AbstractEndpoint;

/**
 * Magento V1 directoryCountryInformationAcquirer API
 *
 * @package KickAss\MageSDK
 */
class Countries extends AbstractEndpoint implements CountriesInterface
{
    protected $path = 'directory/countries';

    /**
     * @return CountryObjectInterface[] array
     * @throws \KickAss\MageSDK\Api\ApiException
     */
    public function getAll():array
    {
        $client = new Client($this->getConfig(), 'GET', $this->getPath(), [], []);
        $response = $client->executeCall();

        return array_map(function ($data) {
            return new CountryObject($data);
        }, $response['body']);
    }

    /**
     * @param string $id
     * @return CountryObjectInterface
     * @throws \KickAss\MageSDK\Api\ApiException
     */
    public function getById(string $id):CountryObjectInterface
    {
        $client = new Client($this->getConfig(), 'GET', $this->getPath() . '/' . $id, [], []);
        $response = $client->executeCall();

        return new CountryObject($response['body']);
    }
}
