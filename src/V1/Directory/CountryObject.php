<?php

namespace Sandermangel\MageSDK\V1\Directory;

use Sandermangel\MageSDK\V1\AbstractObject;

/**
 * Magento V1 directoryCountryInformationAcquirer API country object
 *
 * @package Sandermangel\MageSDK
 */
class CountryObject extends AbstractObject
{
    protected $id;
    protected $iso2;
    protected $iso3;
    protected $localeName;
    protected $englishName;
    protected $regions;

    /**
     * Converts V1 api data into a structured object
     *
     * @param \stdClass $apiData
     */
    public function __construct($apiData)
    {
        $this->id = (string)$apiData->id;
        $this->iso2 = (string)$apiData->two_letter_abbreviation;
        $this->iso3 = (string)$apiData->three_letter_abbreviation;
        $this->localeName = (string)$apiData->full_name_locale;
        $this->englishName = (string)$apiData->full_name_english;
        $this->regions = $apiData->available_regions ?? [] ;
        $this->extensionAttributes = $apiData->extension_attributes ?? [] ;

        $this->regions = array_map(function($data) {
            return new RegionObject($data);
        }, $this->regions);
    }

    /**
     * returns countries ID, internally used by Magento instance
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * returns countries ISO2 abbreviation
     * @return string
     */
    public function getIso2(): string
    {
        return $this->iso2;
    }

    /**
     * returns countries ISO3 abbreviation
     * @return string
     */
    public function getIso3(): string
    {
        return $this->iso3;
    }

    /**
     * returns countries full name in local language
     * @return string
     */
    public function getLocaleName(): string
    {
        return $this->localeName;
    }

    /**
     * returns countries full name in English
     * @return string
     */
    public function getEnglishName(): string
    {
        return $this->englishName;
    }

    /**
     * returns an array with available regions in country as array of RegionObjects
     * @return array
     */
    public function getRegions(): array
    {
        return $this->regions;
    }
}