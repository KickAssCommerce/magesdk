<?php

namespace KickAss\MageSDK\Models\Products\Stock;

use KickAss\MageSDK\ConfigInterface;
use KickAss\MageSDK\Objects\Products\StockItemObjectInterface;

interface ViewInterface
{

    /**
     * Stock view constructor.
     * @param StockItemObjectInterface $stockItemObject
     * @param int $storeId
     * @param ConfigInterface $config
     */
    public function __construct(StockItemObjectInterface $stockItemObject, int $storeId, ConfigInterface $config);

    /**
     * @return StockItemObjectInterface
     */
    public function getStockItemObject(): StockItemObjectInterface;

    /**
     * get products stock quantity
     * @return float
     */
    public function getQty(): float;

    /**
     * get the quantity increments for customer selecting quantity
     * @return int
     */
    public function getQtyIncrements(): int;

    /**
     * Is this product in stock
     * @return bool
     */
    public function getIsInStock(): bool;

    /**
     * Is the product using stock management
     * @return bool
     */
    public function isManageStock():bool;

    /**
     * Is the product alloweing backorders
     * @return bool
     */
    public function isAllowBackorders():bool;

    /**
     * Does the product have a minimal sales quantity
     * @return int
     */
    public function hasMinimalSalesQty():int;
}
