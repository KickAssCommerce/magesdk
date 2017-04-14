<?php

namespace Sandermangel\MageSDK\Models\Products;

use Sandermangel\MageSDK\ConfigInterface;
use Sandermangel\MageSDK\V1\Products;
use Sandermangel\MageSDK\V1\Products\ProductsObject;
use Sandermangel\MageSDK\Models\Products\Stock\View as StockView;

interface ViewInterface
{

    /**
     * ProductInfo constructor.
     * @param string $sku
     * @param int $storeId
     * @param ConfigInterface $config
     */
    public function __construct(string $sku, int $storeId, ConfigInterface $config);

    /**
     * @return ProductsObject
     */
    public function getProductsObject(): ProductsObject;

    /**
     * @return StockView
     */
    public function getStockModel(): StockView;
}
