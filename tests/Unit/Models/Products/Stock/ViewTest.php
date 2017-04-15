<?php

namespace Tests\MageSDK\Models\Products\Stock;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\Models\Products\Stock\View as StockView;
use Sandermangel\MageSDK\V1\Products\StockItemObject;
use Tests\MageSDK\Api\ConfigMock;
use Tests\MageSDK\V1\Products\ProductApiMock;

/**
 * @covers \Sandermangel\MageSDK\Models\Products\Stock\View
 */
class ViewTest extends TestCase
{
    /**
     * @var StockView
     */
    protected $stockModel;

    public function setUp()
    {
        $configMock = new ConfigMock();

        $stockData = new ProductApiMock();
        $this->stockModel = new StockView(new StockItemObject($stockData->extension_attributes->stock_item), 0, $configMock);
    }

    /**
     * @covers \Sandermangel\MageSDK\Models\Products\Stock\View::getIsInStock
     */
    public function testIsInStock()
    {
        $this->assertEquals(true, $this->stockModel->getIsInStock());
    }

    /**
     * @covers \Sandermangel\MageSDK\Models\Products\Stock\View::getQtyIncrements
     * @covers \Sandermangel\MageSDK\Models\Products\Stock\View::getQty
     * @covers \Sandermangel\MageSDK\Models\Products\Stock\View::isManageStock
     * @covers \Sandermangel\MageSDK\Models\Products\Stock\View::isAllowBackorders
     * @covers \Sandermangel\MageSDK\Models\Products\Stock\View::hasMinimalSalesQty
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