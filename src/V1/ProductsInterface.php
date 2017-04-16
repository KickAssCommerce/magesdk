<?php

namespace KickAss\MageSDK\V1;

use KickAss\MageSDK\Api\ApiException;
use KickAss\MageSDK\Objects\Products\ProductsObjectInterface;

/**
 * Magento V1 catalogProductRepositoryV1 API
 *
 * @package KickAss\MageSDK
 */
interface ProductsInterface
{
    /**
     * Retrieve a product by SKU
     * @param string $sku
     * @param int $storeId
     * @param bool $editMode
     * @param bool $forceReload
     * @return ProductsObjectInterface
     * @throws ApiException
     */
    public function getBySku(string $sku, int $storeId, bool $editMode, bool $forceReload): ProductsObjectInterface;
}
