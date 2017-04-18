<?php

namespace Tests\MageSDK\Objects\Products;

use KickAss\MageSDK\Objects\Products\StockItemObject;
use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Objects\Products\ProductsObject;
use Tests\MageSDK\V1\Products\ProductApiMock;

/**
 * @covers \KickAss\MageSDK\Objects\Products\ProductsObject
 */
class ProductObjectTest extends TestCase
{
    /**
     * @var ProductsObject
     */
    protected $product;

    public function setUp()
    {
        $productApiData = new ProductApiMock();

        $stockItem = new StockItemObject(
            $productApiData->extension_attributes->stock_item->item_id,
            $productApiData->extension_attributes->stock_item->product_id,
            $productApiData->extension_attributes->stock_item->stock_id,
            $productApiData->extension_attributes->stock_item->qty,
            $productApiData->extension_attributes->stock_item->min_qty,
            $productApiData->extension_attributes->stock_item->min_sale_qty,
            $productApiData->extension_attributes->stock_item->max_sale_qty,
            $productApiData->extension_attributes->stock_item->is_in_stock,
            $productApiData->extension_attributes->stock_item->is_qty_decimal,
            $productApiData->extension_attributes->stock_item->show_default_notification_message,
            $productApiData->extension_attributes->stock_item->use_config_min_qty,
            $productApiData->extension_attributes->stock_item->use_config_min_sale_qty,
            $productApiData->extension_attributes->stock_item->use_config_max_sale_qty,
            $productApiData->extension_attributes->stock_item->use_config_backorders,
            $productApiData->extension_attributes->stock_item->backorders,
            $productApiData->extension_attributes->stock_item->use_config_notify_stock_qty,
            $productApiData->extension_attributes->stock_item->notify_stock_qty,
            $productApiData->extension_attributes->stock_item->qty_increments,
            $productApiData->extension_attributes->stock_item->use_config_enable_qty_inc,
            $productApiData->extension_attributes->stock_item->enable_qty_increments,
            $productApiData->extension_attributes->stock_item->manage_stock,
            $productApiData->extension_attributes->stock_item->use_config_manage_stock,
            $productApiData->extension_attributes->stock_item->low_stock_date,
            $productApiData->extension_attributes->stock_item->is_decimal_divided,
            $productApiData->extension_attributes->stock_item->stock_status_changed_auto,
            []
        );

        $this->product = new ProductsObject(
            $productApiData->id,
            $productApiData->sku,
            $productApiData->name,
            $productApiData->attribute_set_id,
            (float)$productApiData->price,
            $productApiData->status,
            $productApiData->visibility,
            $productApiData->type_id,
            $productApiData->created_at,
            $productApiData->updated_at,
            (float)$productApiData->weight,
            $stockItem,
            (array)$productApiData->extension_attributes->bundle_product_options,
            (array)$productApiData->extension_attributes->downloadable_product_links,
            (array)$productApiData->extension_attributes->downloadable_product_samples,
            (array)$productApiData->extension_attributes->giftcard_amounts,
            (array)$productApiData->extension_attributes->configurable_product_options,
            (array)$productApiData->product_links,
            (array)$productApiData->options,
            (array)$productApiData->media_gallery_entries,
            (array)$productApiData->tier_prices,
            (array)$productApiData->custom_attributes,
            (array)$productApiData->extension_attributes
        );
    }

    /**
     * @covers \KickAss\MageSDK\Objects\Products\ProductsObject::getSku
     */
    public function testSimpleGetters()
    {
        $this->assertEquals('24-MB01', $this->product->getSku());
    }
}