<?php

namespace Sandermangel\MageSDK\Models\Products;

use Sandermangel\MageSDK\ConfigInterface;
use Sandermangel\MageSDK\Models\Products\Stock\ViewInterface as StockViewInterface;
use Sandermangel\MageSDK\V1\Products\ProductsObjectInterface;
use Sandermangel\MageSDK\V1\Products\StockItemObjectInterface;
use Sandermangel\MageSDK\V1\ProductsInterface;

interface ViewInterface
{

    /**
     * ProductInfo constructor.
     * @param string $sku
     * @param int $storeId
     * @param ProductsInterface $productApi
     * @param ConfigInterface $config
     * @internal param $Product
     */
    public function __construct(string $sku, int $storeId, ProductsInterface $productApi, ConfigInterface $config);

    /**
     * @return ProductsObjectInterface
     */
    public function getProductsObject(): ProductsObjectInterface;

    /**
     * @return StockItemObjectInterface
     */
    public function getStockItemObject(): StockItemObjectInterface;

    /**
     * @return StockViewInterface
     */
    public function getStockModel(): StockViewInterface;
}
