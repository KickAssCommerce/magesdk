<?php

namespace Sandermangel\MageSDK\V1;

/**
 * Magento V1 abstract data object
 *
 * @package Sandermangel\MageSDK
 */
abstract class AbstractObject
{
    /**
     * @var array
     */
    protected $extensionAttributes = [];


    /**
     * returns an array of 3rd party added attributes
     * @return array
     */
    public function getExtensionAttributes(): array
    {
        return $this->extensionAttributes;
    }

}