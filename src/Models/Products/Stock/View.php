<?php

namespace KickAss\MageSDK\Models\Products\Stock;

use KickAss\MageSDK\ConfigInterface;
use KickAss\MageSDK\Models\Store;
use KickAss\MageSDK\V1\Products\StockItemObjectInterface;
use KickAss\MageSDK\V1\Store\Config as StoreConfig;

class View implements ViewInterface
{
    protected $stockItemObject;
    protected $config;

    /**
     * Stock view constructor.
     * @param StockItemObjectInterface $stockItemObject
     * @param int $storeId
     * @param ConfigInterface $config
     */
    public function __construct(StockItemObjectInterface $stockItemObject, int $storeId, ConfigInterface $config)
    {
        $this->stockItemObject = $stockItemObject;
        $this->config = $config;
        $this->store = new Store($this->config->getApiStoreCode(), new StoreConfig($this->config));
    }

    /**
     * @return StockItemObjectInterface
     */
    public function getStockItemObject(): StockItemObjectInterface
    {
        return $this->stockItemObject;
    }

    /**
     * get products stock quantity
     * @return float
     */
    public function getQty(): float
    {
        return $this->getStockItemObject()->getQty();
    }

    /**
     * get the quantity increments for customer selecting quantity
     * @return int
     */
    public function getQtyIncrements(): int
    {
        return max(1, $this->getStockItemObject()->getQtyIncrements());
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

        // qty is lower than 0 or the allowed nr of backorders
        if ($qtyAvailable <= 0 || false === (bool)$this->isAllowBackorders()) {
            return false;
        }

        // if the minimal sales QTY is higher than the available stock we don't have stock
        if ($this->hasMinimalSalesQty() > $qtyAvailable) {
            return false;
        }

        return true;
    }

    /**
     * Is the product using stock management
     * @return bool
     */
    public function isManageStock():bool
    {
        return ($this->getStockItemObject()->isUseConfigManageStock()) ?
            true : // @todo add call to core_config_data value via StoreModel API
            $this->getStockItemObject()->isManageStock();
    }

    /**
     * Is the product alloweing backorders
     * @return bool
     */
    public function isAllowBackorders():bool
    {
        return ($this->getStockItemObject()->isUseConfigBackorders()) ?
            true : // @todo add call to core_config_data value via StoreModel API
            $this->getStockItemObject()->getBackorders();
    }

    /**
     * Does the product have a minimal sales quantity
     * @return int
     */
    public function hasMinimalSalesQty():int
    {
        return ($this->getStockItemObject()->isUseConfigMinSaleQty()) ?
            false : // @todo add call to core_config_data value via StoreModel API
            $this->getStockItemObject()->getMinSaleQty();
    }
}
