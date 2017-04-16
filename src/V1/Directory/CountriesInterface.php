<?php

namespace KickAss\MageSDK\V1\Directory;

use KickAss\MageSDK\ConfigInterface;
use KickAss\MageSDK\Objects\Directory\CountryObjectInterface;

/**
 * Magento V1 directoryCountryInformationAcquirer API
 *
 * @package KickAss\MageSDK
 */
interface CountriesInterface
{
    /**
     * @return CountryObjectInterface[] array
     * @throws \KickAss\MageSDK\Api\ApiException
     */
    public function getAll() : array;

    /**
     * @param string $id
     * @return CountryObjectInterface
     * @throws \KickAss\MageSDK\Api\ApiException
     */
    public function getById(string $id) : CountryObjectInterface;
}