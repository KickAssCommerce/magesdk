<?php

namespace Sandermangel\MageSDK\V1\Directory;

use Sandermangel\MageSDK\V1\AbstractObject;

/**
 * Magento V1 directoryCountryInformationAcquirer API region object
 *
 * @package Sandermangel\MageSDK
 */
class RegionObject extends AbstractObject
{
    protected $id;
    protected $code;
    protected $name;

    /**
     * Converts V1 api data into a structured object
     *
     * @param \stdClass $apiData
     */
    public function __construct($apiData)
    {
        $this->id = (int)$apiData->id;
        $this->code = (string)$apiData->code;
        $this->name = (string)$apiData->name;
    }

    /**
     * returns regions ID, internally used by Magento instance
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * returns regions numeric code
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * returns regions locale name
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
