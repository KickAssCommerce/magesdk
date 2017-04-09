<?php

namespace Sandermangel\MageSDK\V1\Products;

use Sandermangel\MageSDK\V1\AbstractObject;

/**
 * Magento V1 catalogProductRepositoryV1 API stock item object
 *
 * @package Sandermangel\MageSDK
 */
class StockItemObject extends AbstractObject
{
    protected $extension_attributes;
    protected $stock_status_changed_auto;
    protected $is_decimal_divided;
    protected $low_stock_date;
    protected $use_config_manage_stock;
    protected $manage_stock;
    protected $use_config_enable_qty_inc;
    protected $enable_qty_increments;
    protected $qty_increments;
    protected $notify_stock_qty;
    protected $use_config_notify_stock_qty;
    protected $backorders;
    protected $use_config_backorders;
    protected $use_config_max_sale_qty;
    protected $use_config_min_sale_qty;
    protected $use_config_min_qty;
    protected $show_default_notification_message;
    protected $is_qty_decimal;
    protected $is_in_stock;
    protected $max_sale_qty;
    protected $min_sale_qty;
    protected $min_qty;
    protected $qty;
    protected $stock_id;
    protected $product_id;
    protected $id;

    /**
     * Converts V1 api data into a structured object
     *
     * @param \stdClass $apiData
     */
    public function __construct($apiData)
    {
        $this->id = (int)$apiData->item_id;
        $this->product_id = (int)$apiData->product_id;
        $this->stock_id = (int)$apiData->stock_id;
        $this->qty = (float)$apiData->qty;
        $this->min_qty = (float)$apiData->min_qty;
        $this->min_sale_qty = (float)$apiData->min_sale_qty;
        $this->max_sale_qty = (float)$apiData->max_sale_qty;
        $this->is_in_stock = (bool)$apiData->is_in_stock;
        $this->is_qty_decimal = (bool)$apiData->is_qty_decimal;
        $this->show_default_notification_message = (bool)$apiData->show_default_notification_message;
        $this->use_config_min_qty = (bool)$apiData->use_config_min_qty;
        $this->use_config_min_sale_qty = (bool)$apiData->use_config_min_sale_qty;
        $this->use_config_max_sale_qty = (bool)$apiData->use_config_max_sale_qty;
        $this->use_config_backorders = (bool)$apiData->use_config_backorders;
        $this->backorders = (int)$apiData->backorders;
        $this->use_config_notify_stock_qty = (bool)$apiData->use_config_notify_stock_qty;
        $this->notify_stock_qty = (int)$apiData->notify_stock_qty;
        $this->qty_increments = (int)$apiData->qty_increments;
        $this->use_config_enable_qty_inc = (bool)$apiData->use_config_enable_qty_inc;
        $this->enable_qty_increments = (bool)$apiData->enable_qty_increments;
        $this->manage_stock = (bool)$apiData->manage_stock;
        $this->use_config_manage_stock = (bool)$apiData->use_config_manage_stock;
        $this->low_stock_date = (string)$apiData->low_stock_date;
        $this->is_decimal_divided = (bool)$apiData->is_decimal_divided;
        $this->stock_status_changed_auto = (int)$apiData->stock_status_changed_auto;
        $this->extension_attributes = $apiData->extension_attributes ?? [];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }

    /**
     * @return int
     */
    public function getStockId(): int
    {
        return $this->stock_id;
    }

    /**
     * @return float
     */
    public function getQty(): float
    {
        return $this->qty;
    }

    /**
     * @return float
     */
    public function getMinQty(): float
    {
        return $this->min_qty;
    }

    /**
     * @return float
     */
    public function getMinSaleQty(): float
    {
        return $this->min_sale_qty;
    }

    /**
     * @return float
     */
    public function getMaxSaleQty(): float
    {
        return $this->max_sale_qty;
    }

    /**
     * @return boolean
     */
    public function isInStock(): bool
    {
        return $this->is_in_stock;
    }

    /**
     * @return boolean
     */
    public function isQtyDecimal(): bool
    {
        return $this->is_qty_decimal;
    }

    /**
     * @return boolean
     */
    public function isShowDefaultNotificationMessage(): bool
    {
        return $this->show_default_notification_message;
    }

    /**
     * @return boolean
     */
    public function isUseConfigMinQty(): bool
    {
        return $this->use_config_min_qty;
    }

    /**
     * @return boolean
     */
    public function isUseConfigMinSaleQty(): bool
    {
        return $this->use_config_min_sale_qty;
    }

    /**
     * @return boolean
     */
    public function isUseConfigMaxSaleQty(): bool
    {
        return $this->use_config_max_sale_qty;
    }

    /**
     * @return boolean
     */
    public function isUseConfigBackorders(): bool
    {
        return $this->use_config_backorders;
    }

    /**
     * @return int
     */
    public function getBackorders(): int
    {
        return $this->backorders;
    }

    /**
     * @return boolean
     */
    public function isUseConfigNotifyStockQty(): bool
    {
        return $this->use_config_notify_stock_qty;
    }

    /**
     * @return int
     */
    public function getNotifyStockQty(): int
    {
        return $this->notify_stock_qty;
    }

    /**
     * @return int
     */
    public function getQtyIncrements(): int
    {
        return $this->qty_increments;
    }

    /**
     * @return boolean
     */
    public function isUseConfigEnableQtyInc(): bool
    {
        return $this->use_config_enable_qty_inc;
    }

    /**
     * @return boolean
     */
    public function isManageStock(): bool
    {
        return $this->manage_stock;
    }

    /**
     * @return boolean
     */
    public function isUseConfigManageStock(): bool
    {
        return $this->use_config_manage_stock;
    }

    /**
     * @return \DateTime
     */
    public function getLowStockDate(): \DateTime
    {
        return new \DateTime($this->low_stock_date);
    }

    /**
     * @return boolean
     */
    public function isDecimalDivided(): bool
    {
        return $this->is_decimal_divided;
    }

    /**
     * @return int
     */
    public function getStockStatusChangedAuto(): int
    {
        return $this->stock_status_changed_auto;
    }

    /**
     * @return boolean
     */
    public function isEnableQtyIncrements(): bool
    {
        return $this->enable_qty_increments;
    }
}