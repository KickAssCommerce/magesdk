<?php

namespace Tests\MageSDK\Models\Products;

use Sandermangel\MageSDK\ConfigInterface;
use Sandermangel\MageSDK\Models\Products\Stock\View as StockView;
use Sandermangel\MageSDK\Models\Products\ViewInterface;
use Sandermangel\MageSDK\V1\Products\ProductsObject;

class ProductViewMock implements ViewInterface
{

    /**
     * ProductInfo constructor.
     * @param string $sku
     * @param int $storeId
     * @param ConfigInterface $config
     */
    public function __construct(string $sku, int $storeId, ConfigInterface $config)
    {

    }

    /**
     * @return ProductsObject
     */
    public function getProductsObject(): ProductsObject
    {
        // TODO: Implement getProductsObject() method.
    }

    /**
     * @return StockView
     */
    public function getStockModel(): StockView
    {
        // TODO: Implement getStockModel() method.
    }
}