<?php

namespace Sandermangel\MageSDK\Models\Product;

use Sandermangel\MageSDK\Config;
use Sandermangel\MageSDK\V1\Products;
use Sandermangel\MageSDK\V1\Products\ProductsObject;

class ProductInfo
{
    /**
     * @var ProductsObject
     */
    protected $productsObject;

    /**
     * ProductInfo constructor.
     * @param string $sku
     * @param int $storeId
     */
    public function __construct(string $sku, int $storeId)
    {
        $productApi = new Products(new Config());
        $this->productsObject = $productApi->getBySku($sku);
    }

    /**
     * @return ProductsObject
     */
    public function getProductsObject(): ProductsObject
    {
        return $this->productsObject;
    }


}