<?php

namespace Sandermangel\MageSDK\V1;

/**
 * Magento V1 abstract data object
 *
 * @package Sandermangel\MageSDK
 */
trait ObjectTrait
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
        return (array)$this->extensionAttributes;
    }
}
