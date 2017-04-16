<?php

namespace KickAss\MageSDK\Objects\Directory;

/**
 * Magento V1 directoryCountryInformationAcquirer API country object
 *
 * @package KickAss\MageSDK
 */
interface CountryObjectInterface
{
    /**
     * returns countries ID, internally used by Magento instance
     * @return string
     */
    public function getId() : string;

    /**
     * returns countries ISO2 abbreviation
     * @return string
     */
    public function getIso2() : string;

    /**
     * returns countries ISO3 abbreviation
     * @return string
     */
    public function getIso3() : string;

    /**
     * returns countries full name in local language
     * @return string
     */
    public function getLocaleName() : string;

    /**
     * returns countries full name in English
     * @return string
     */
    public function getEnglishName() : string;

    /**
     * returns an array with available regions in country as array of RegionObjects
     * @return array
     */
    public function getRegions() : array;

    /**
     * returns an array of 3rd party added attributes
     * @return array
     */
    public function getExtensionAttributes() : array;
}