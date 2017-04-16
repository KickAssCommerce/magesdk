<?php

namespace KickAss\MageSDK\Objects\Directory;


/**
 * Magento V1 directoryCountryInformationAcquirer API region object
 *
 * @package KickAss\MageSDK
 */
interface RegionObjectInterface
{
    /**
     * returns regions ID, internally used by Magento instance
     * @return int
     */
    public function getId() : int;

    /**
     * returns regions numeric code
     * @return string
     */
    public function getCode() : string;

    /**
     * returns regions locale name
     * @return string
     */
    public function getName() : string;

    /**
     * returns an array of 3rd party added attributes
     * @return array
     */
    public function getExtensionAttributes() : array;
}