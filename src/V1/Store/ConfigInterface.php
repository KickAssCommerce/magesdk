<?php

namespace KickAss\MageSDK\V1\Store;

/**
 * Magento V1 storeStoreConfigManagerV1 API
 *
 * @package KickAss\MageSDK
 */
interface ConfigInterface
{
    /**
     * @param string $code
     * @return \stdClass
     */
    public function getByStoreCode(string $code): \stdClass;
}
