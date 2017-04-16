<?php

namespace Tests\MageSDK\Objects\Products;

use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Objects\Products\StockItemObject;
use Tests\MageSDK\V1\Products\ProductApiMock;

/**
 * @covers \KickAss\MageSDK\Objects\Products\StockItemObject
 */
class StockItemObjectTest extends TestCase
{
    /**
     * @var StockItemObject
     */
    protected $stock;

    public function setUp()
    {
        $product = new ProductApiMock();

        $this->stock = new StockItemObject($product->extension_attributes->stock_item);
    }

    /**
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::getLowStockDate()
     */
    public function testStockDate()
    {
        $this->assertInstanceOf(\DateTime::class, $this->stock->getLowStockDate());
        $this->assertEquals((New \DateTime('now'))->format('Y-m-d'), $this->stock->getLowStockDate()->format('Y-m-d'));
    }

    /**
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::getStockStatusChangedAuto()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::isDecimalDivided()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::isManageStock()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::isEnableQtyIncrements()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::isQtyDecimal()
     */
    public function testConfigSettings()
    {
        $this->assertEquals(0, $this->stock->getStockStatusChangedAuto());
        $this->assertEquals(true, $this->stock->isDecimalDivided());
        $this->assertEquals(true, $this->stock->isManageStock());
        $this->assertEquals(true, $this->stock->isEnableQtyIncrements());
        $this->assertEquals(true, $this->stock->isQtyDecimal());
    }

    /**
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::getId()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::getProductId()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::getStockId()
     */
    public function testGetIds()
    {
        $this->assertEquals(3, $this->stock->getId());
        $this->assertEquals(2, $this->stock->getProductId());
        $this->assertEquals(1, $this->stock->getStockId());
    }

    /**
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::getQty()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::getMinQty()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::getMinSaleQty()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::getMaxSaleQty()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::getQtyIncrements()
     */
    public function testGetQtys()
    {
        $this->assertEquals(5, $this->stock->getQty());
        $this->assertEquals(2, $this->stock->getMinQty());
        $this->assertEquals(2, $this->stock->getMinSaleQty());
        $this->assertEquals(10, $this->stock->getMaxSaleQty());
        $this->assertEquals(2, $this->stock->getQtyIncrements());
    }

    /**
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::isUseConfigBackorders()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::isUseConfigEnableQtyInc()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::isUseConfigManageStock()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::isUseConfigMaxSaleQty()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::isUseConfigMinQty()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::isUseConfigMinSaleQty()
     * @covers \KickAss\MageSDK\Objects\Products\StockItemObject::isUseConfigNotifyStockQty()
     */
    public function testUseConfigs()
    {
        $this->assertEquals(true, $this->stock->isUseConfigBackorders());
        $this->assertEquals(true, $this->stock->isUseConfigEnableQtyInc());
        $this->assertEquals(true, $this->stock->isUseConfigManageStock());
        $this->assertEquals(true, $this->stock->isUseConfigMaxSaleQty());
        $this->assertEquals(true, $this->stock->isUseConfigMinQty());
        $this->assertEquals(false, $this->stock->isUseConfigMinSaleQty());
        $this->assertEquals(true, $this->stock->isUseConfigNotifyStockQty());
    }
}