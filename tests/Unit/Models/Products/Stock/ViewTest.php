<?php

namespace Tests\MageSDK\Models\Products\Stock;

use KickAss\MageSDK\Config;
use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Models\Products\Stock\View as StockView;
use KickAss\MageSDK\V1\Products\StockItemObject;
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
        $config = $this->createMock(Config::class);
        $config->method('getApiToken')
            ->willReturn('abcdefg');
        $config->method('getBaseUrl')
            ->willReturn('http://127.0.0.1/');
        $config->method('getApiStoreCode')
            ->willReturn('default');

        $stockData = new ProductApiMock();
        $this->stockModel = new StockView(new StockItemObject($stockData->extension_attributes->stock_item), 0, $config);
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