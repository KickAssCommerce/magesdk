<?php

namespace Tests\MageSDK\Models\Products\Stock;

use KickAss\MageSDK\Config;
use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Models\Products\Stock\View as StockView;
use KickAss\MageSDK\Objects\Products\StockItemObject;
use Tests\MageSDK\V1\Products\ProductApiMock;

/**
 * @covers \KickAss\MageSDK\Models\Products\Stock\View
 */
class ViewTest extends TestCase
{
    /**
     * @var StockView
     */
    protected $stockModel;

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

        $stockData = new ProductApiMock();
        $this->stockModel = new StockView(new StockItemObject(
            $stockData->extension_attributes->stock_item->item_id,
            $stockData->extension_attributes->stock_item->product_id,
            $stockData->extension_attributes->stock_item->stock_id,
            $stockData->extension_attributes->stock_item->qty,
            $stockData->extension_attributes->stock_item->min_qty,
            $stockData->extension_attributes->stock_item->min_sale_qty,
            $stockData->extension_attributes->stock_item->max_sale_qty,
            $stockData->extension_attributes->stock_item->is_in_stock,
            $stockData->extension_attributes->stock_item->is_qty_decimal,
            $stockData->extension_attributes->stock_item->show_default_notification_message,
            $stockData->extension_attributes->stock_item->use_config_min_qty,
            $stockData->extension_attributes->stock_item->use_config_min_sale_qty,
            $stockData->extension_attributes->stock_item->use_config_max_sale_qty,
            $stockData->extension_attributes->stock_item->use_config_backorders,
            $stockData->extension_attributes->stock_item->backorders,
            $stockData->extension_attributes->stock_item->use_config_notify_stock_qty,
            $stockData->extension_attributes->stock_item->notify_stock_qty,
            $stockData->extension_attributes->stock_item->qty_increments,
            $stockData->extension_attributes->stock_item->use_config_enable_qty_inc,
            $stockData->extension_attributes->stock_item->enable_qty_increments,
            $stockData->extension_attributes->stock_item->manage_stock,
            $stockData->extension_attributes->stock_item->use_config_manage_stock,
            $stockData->extension_attributes->stock_item->low_stock_date,
            $stockData->extension_attributes->stock_item->is_decimal_divided,
            $stockData->extension_attributes->stock_item->stock_status_changed_auto,
            []
        ), 0, $config);
    }

    /**
     * @covers \KickAss\MageSDK\Models\Products\Stock\View::getIsInStock
     */
    public function testIsInStock()
    {
        $this->assertEquals(true, $this->stockModel->getIsInStock());
    }

    /**
     * @covers \KickAss\MageSDK\Models\Products\Stock\View::getQtyIncrements
     * @covers \KickAss\MageSDK\Models\Products\Stock\View::getQty
     * @covers \KickAss\MageSDK\Models\Products\Stock\View::isManageStock
     * @covers \KickAss\MageSDK\Models\Products\Stock\View::isAllowBackorders
     * @covers \KickAss\MageSDK\Models\Products\Stock\View::hasMinimalSalesQty
     */
    public function testSimpleGetters()
    {
        $this->assertEquals(2, $this->stockModel->getQtyIncrements());
        $this->assertEquals(5, $this->stockModel->getQty());
        $this->assertEquals(true, $this->stockModel->isManageStock());
        $this->assertEquals(true, $this->stockModel->isAllowBackorders());
        $this->assertEquals(true, $this->stockModel->hasMinimalSalesQty());
    }

}