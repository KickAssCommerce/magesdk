<?php

namespace Sandermangel\MageSDK\V1\Store;

/**
 * Magento V1 storeStoreConfigManagerV1 API
 *
 * @package Sandermangel\MageSDK
 */
interface ConfigInterface
{
    /**
     * @param string $code
     * @return \stdClass
     */
    public function getByStoreCode(string $code): \stdClass;
}
