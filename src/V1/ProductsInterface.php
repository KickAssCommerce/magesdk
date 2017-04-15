<?php
/**
 * Created by PhpStorm.
 * User: sander
 * Date: 14-4-17
 * Time: 19:05
 */
namespace Sandermangel\MageSDK\V1;

use Sandermangel\MageSDK\Api\ApiException;
use Sandermangel\MageSDK\V1\Products\ProductsObjectInterface;


/**
 * Magento V1 catalogProductRepositoryV1 API
 *
 * @package Sandermangel\MageSDK
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
    public function getBySku(string $sku, $storeId = 0, $editMode = false, $forceReload = false) : ProductsObjectInterface;
}