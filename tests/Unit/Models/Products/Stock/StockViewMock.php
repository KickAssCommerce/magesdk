<?php

namespace Tests\MageSDK\Models\Products;

use Sandermangel\MageSDK\ConfigInterface;
use Sandermangel\MageSDK\Models\Products\ViewInterface;
use Sandermangel\MageSDK\Models\Products\Stock\ViewInterface as StockViewInterface;
use Sandermangel\MageSDK\V1\Products\StockItemObject;

class StockViewMock implements StockViewInterface
{
    /**
     * Stock view constructor.
     * @param ViewInterface $product
     * @param int $storeId
     * @param ConfigInterface $config
     */
    public function __construct(ViewInterface $product, int $storeId, ConfigInterface $config)
    {
    }

    /**
     * @return StockItemObject
     */
    public function getStockItemObject(): StockItemObject
    {
        // TODO: Implement getStockItemObject() method.
    }

    /**
     * get products stock quantity
     * @return float
     */
    public function getQty(): float
    {
        // TODO: Implement getQty() method.
    }

    /**
     * get the quantity increments for customer selecting quantity
     * @return int
     */
    public function getQtyIncrements(): int
    {
        // TODO: Implement getQtyIncrements() method.
    }

    /**
     * Is this product in stock
     * @return bool
     */
    public function getIsInStock(): bool
    {
        // TODO: Implement getIsInStock() method.
    }

    /**
     * Is the product using stock management
     * @return bool
     */
    public function isManageStock():bool
    {
        // TODO: Implement isManageStock() method.
    }

    /**
     * Is the product alloweing backorders
     * @return bool
     */
    public function isAllowBackorders():bool
    {
        // TODO: Implement isAllowBackorders() method.
    }

    /**
     * Does the product have a minimal sales quantity
     * @return int
     */
    public function hasMinimalSalesQty():int
    {
        // TODO: Implement hasMinimalSalesQty() method.
    }
}