<?php

namespace KickAss\MageSDK\V1;

/**
 * Magento V1 storeStoreConfigManagerV1 API
 *
 * @package KickAss\MageSDK
 */
interface StoreInterface
{
    /**
     * @param string $code
     * @return \stdClass
     */
    public function getByStoreCode(string $code): \stdClass;
}
