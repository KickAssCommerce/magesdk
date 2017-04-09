<?php

namespace Sandermangel\MageSDK\Models\Products;

use Sandermangel\MageSDK\ConfigInterface;
use Sandermangel\MageSDK\V1\Products;
use Sandermangel\MageSDK\V1\Products\ProductsObject;
use Sandermangel\MageSDK\Models\Products\Stock\View as StockView;

class View
{
    protected $productsObject;
    protected $stockModel;
    protected $config;

    /**
     * ProductInfo constructor.
     * @param string $sku
     * @param int $storeId
     * @param ConfigInterface $config
     */
    public function __construct(string $sku, int $storeId, ConfigInterface $config)
    {
        $this->config = $config;

        $productApi = new Products($this->config);
        $this->productsObject = $productApi->getBySku($sku);

        $this->stockModel = new StockView($this, $storeId, $this->config);
    }

    /**
     * @return ProductsObject
     */
    public function getProductsObject(): ProductsObject
    {
        return $this->productsObject;
    }

    /**
     * @return StockView
     */
    public function getStockModel(): StockView
    {
        return $this->stockModel;
    }
}
