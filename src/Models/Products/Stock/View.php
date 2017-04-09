<?php

namespace Sandermangel\MageSDK\Models\Products\Stock;

use Sandermangel\MageSDK\ConfigInterface;
use Sandermangel\MageSDK\Models\Store;
use Sandermangel\MageSDK\V1\Products\StockItemObject;
use Sandermangel\MageSDK\Models\Products\View as ProductView;
use Sandermangel\MageSDK\V1\Store\Config as StoreConfig;

class View
{
    protected $stockItemObject;
    protected $config;

    /**
     * ProductInfo constructor.
     * @param ProductView $product
     * @param int $storeId
     * @param ConfigInterface $config
     */
    public function __construct(ProductView $product, int $storeId, ConfigInterface $config)
    {
        $this->stockItemObject = $product->getProductsObject()->getStockItem();
        $this->config = $config;
        $this->store = new Store($this->config->getApiStoreCode(), new StoreConfig($this->config));
    }

    /**
     * @return StockItemObject
     */
    public function getStockItemObject(): StockItemObject
    {
        return $this->stockItemObject;
    }

    /**
     * Is this product in stock
     * @return bool
     */
    public function getIsInStock(): bool
    {
        $stockObject = $this->getStockItemObject();

        if (!$this->isManageStock()) { // we don't manage stock so it's always in stock
            return true;
        }

        if (!$stockObject->isInStock()) { // product is flagged as not in stock so it's not
            return false;
        }

        $qtyAvailable = $stockObject->getQty(); // how many items do we actually have

        if ($qtyAvailable <= (int)$this->isAllowBackorders() * -1) { // qty is lower than 0 or the allowed nr of backorders
            return false;
        }

        if ($this->hasMinimalSalesQty() > $qtyAvailable) { // if the minimal sales QTY is higher than the available stock we don't have stock
            return false;
        }

        return true;
    }

    /**
     * @return bool
     */
    public function isManageStock():bool
    {
        return ($this->getStockItemObject()->isUseConfigManageStock()) ?
            true : // @todo add call to core_config_data value via StoreModel API
            $this->getStockItemObject()->isManageStock();
    }

    /**
     * @return bool
     */
    public function isAllowBackorders():bool
    {
        return ($this->getStockItemObject()->isUseConfigBackorders()) ?
            true : // @todo add call to core_config_data value via StoreModel API
            $this->getStockItemObject()->getBackorders();
    }

    /**
     * @return int
     */
    public function hasMinimalSalesQty():int
    {
        return ($this->getStockItemObject()->isUseConfigMinSaleQty()) ?
            false : // @todo add call to core_config_data value via StoreModel API
            $this->getStockItemObject()->getMaxSaleQty();
    }
}
