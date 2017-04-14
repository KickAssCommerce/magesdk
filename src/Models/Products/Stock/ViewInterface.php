<?php

namespace Sandermangel\MageSDK\Models\Products\Stock;

use Sandermangel\MageSDK\ConfigInterface;
use Sandermangel\MageSDK\V1\Products\StockItemObject;
use Sandermangel\MageSDK\Models\Products\ViewInterface as ProductViewInterface;

interface ViewInterface
{

    /**
     * Stock view constructor.
     * @param ProductViewInterface $product
     * @param int $storeId
     * @param ConfigInterface $config
     */
    public function __construct(ProductViewInterface $product, int $storeId, ConfigInterface $config);

    /**
     * @return StockItemObject
     */
    public function getStockItemObject(): StockItemObject;

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
