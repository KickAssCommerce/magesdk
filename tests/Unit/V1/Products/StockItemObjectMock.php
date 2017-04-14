<?php

namespace Tests\MageSDK\V1\Products;

use Sandermangel\MageSDK\V1\Products\StockItemObject;

/**
 * Magento V1 catalogProductRepositoryV1 API stock item object
 *
 * @package Sandermangel\MageSDK
 */
class StockItemObjectMock extends StockItemObject
{
    public function __construct($apiData)
    {
        $this->item_id = 3;
        $this->product_id = 2;
        $this->stock_id = 1;
        $this->qty = 5;
        $this->is_in_stock = true;
        $this->is_qty_decimal = true;
        $this->show_default_notification_message = true;
        $this->use_config_min_qty = true;
        $this->min_qty = 2;
        $this->use_config_min_sale_qty = 0;
        $this->min_sale_qty = 2;
        $this->use_config_max_sale_qty = true;
        $this->max_sale_qty = 10;
        $this->use_config_backorders = true;
        $this->backorders = 0;
        $this->use_config_notify_stock_qty = true;
        $this->notify_stock_qty = 0;
        $this->use_config_qty_increments = true;
        $this->qty_increments = 2;
        $this->use_config_enable_qty_inc = true;
        $this->enable_qty_increments = true;
        $this->use_config_manage_stock = true;
        $this->manage_stock = true;
        $this->low_stock_date = (New \DateTime('now'))->format('Y-m-d');
        $this->is_decimal_divided = true;
        $this->stock_status_changed_auto = 0;
        $this->extension_attributes = [];
    }
}