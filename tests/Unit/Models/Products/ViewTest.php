<?php

namespace Tests\MageSDK\Models\Products;

use KickAss\MageSDK\Config;
use KickAss\MageSDK\Objects\Products\StockItemObject;
use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Models\Products\View as ProductsView;
use KickAss\MageSDK\V1\Products;
use KickAss\MageSDK\Objects\Products\ProductsObject;
use Tests\MageSDK\V1\Products\ProductApiMock;

/**
 * @covers \KickAss\MageSDK\Models\Products\View
 */
class ViewTest extends TestCase
{
    /**
     * @var ProductsView
     */
    protected $productView;

    public function setUp()
    {
        $config = $this->getMockBuilder(Config::class)
            ->disableOriginalConstructor()
            ->getMock();
        $config->method('getApiToken')
            ->willReturn('abcdefg');
        $config->method('getBaseUrl')
            ->willReturn('http://127.0.0.1/');
        $config->method('getApiStoreCode')
            ->willReturn('default');
        
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
        
        $productApi = $this->createMock(Products::class);
        $productApi->method('getBySku')
            ->willReturn(new ProductsObject(
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
            ));

        $this->productView = new ProductsView('24-MB01', 0, $productApi, $config);
    }

    /**
     * @covers \KickAss\MageSDK\Models\Products\View::getCreatedAt
     * @covers \KickAss\MageSDK\Models\Products\View::getUpdatedAt
     */
    public function testDates()
    {
        $this->assertInstanceOf(\DateTime::class, $this->productView->getCreatedAt());
        $this->assertEquals('2016-02-01', $this->productView->getCreatedAt()->format('Y-m-d'));

        $this->assertInstanceOf(\DateTime::class, $this->productView->getUpdatedAt());
        $this->assertEquals((new \DateTime('now'))->format('Y-m-d'), $this->productView->getUpdatedAt()->format('Y-m-d'));
    }

}