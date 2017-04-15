<?php

namespace Tests\MageSDK\V1\Products;


class ProductApiMock extends \stdClass
{
    public function __construct()
    {
        $this->id = 1;
        $this->sku = '24-MB01';
        $this->name = 'Duffle bag';
        $this->attribute_set_id = 1;
        $this->price = 50.95;
        $this->status = 1;
        $this->visibility = 2;
        $this->type_id = 'simple';
        $this->created_at = '2016-02-01';
        $this->updated_at = (new \DateTime('now'))->format('Y-m-d');
        $this->weight = 0.9;

        $this->extension_attributes = new \stdClass();
        $this->extension_attributes->stock_item = new \stdClass();
        $this->extension_attributes->stock_item->item_id = 3;
        $this->extension_attributes->stock_item->product_id = 2;
        $this->extension_attributes->stock_item->stock_id = 1;
        $this->extension_attributes->stock_item->qty = 5;
        $this->extension_attributes->stock_item->is_in_stock = true;
        $this->extension_attributes->stock_item->is_qty_decimal = true;
        $this->extension_attributes->stock_item->show_default_notification_message = true;
        $this->extension_attributes->stock_item->use_config_min_qty = true;
        $this->extension_attributes->stock_item->min_qty = 2;
        $this->extension_attributes->stock_item->use_config_min_sale_qty = 0;
        $this->extension_attributes->stock_item->min_sale_qty = 2;
        $this->extension_attributes->stock_item->use_config_max_sale_qty = true;
        $this->extension_attributes->stock_item->max_sale_qty = 10;
        $this->extension_attributes->stock_item->use_config_backorders = true;
        $this->extension_attributes->stock_item->backorders = 0;
        $this->extension_attributes->stock_item->use_config_notify_stock_qty = true;
        $this->extension_attributes->stock_item->notify_stock_qty = 0;
        $this->extension_attributes->stock_item->use_config_qty_increments = true;
        $this->extension_attributes->stock_item->qty_increments = 2;
        $this->extension_attributes->stock_item->use_config_enable_qty_inc = true;
        $this->extension_attributes->stock_item->enable_qty_increments = true;
        $this->extension_attributes->stock_item->use_config_manage_stock = true;
        $this->extension_attributes->stock_item->manage_stock = true;
        $this->extension_attributes->stock_item->low_stock_date = (New \DateTime('now'))->format('Y-m-d');
        $this->extension_attributes->stock_item->is_decimal_divided = true;
        $this->extension_attributes->stock_item->stock_status_changed_auto = 0;

        $this->extension_attributes->bundle_product_options = [];
        $this->extension_attributes->downloadable_product_links = [];
        $this->extension_attributes->downloadable_product_samples = [];
        $this->extension_attributes->giftcard_amounts = [];
        $this->extension_attributes->configurable_product_options = [];

        $this->product_links = [];
        $this->options = [];
        $this->media_gallery_entries = [];
        $this->tier_prices = [];
        $this->custom_attributes = [];
    }
}