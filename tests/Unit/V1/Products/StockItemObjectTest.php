<?php

namespace Tests\MageSDK\V1\Products;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\V1\Products\StockItemObject;

/**
 * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject
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
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::getLowStockDate()
     */
    public function testStockDate()
    {
        $this->assertInstanceOf(\DateTime::class, $this->stock->getLowStockDate());
        $this->assertEquals((New \DateTime('now'))->format('Y-m-d'), $this->stock->getLowStockDate()->format('Y-m-d'));
    }

    /**
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::getStockStatusChangedAuto()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::isDecimalDivided()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::isManageStock()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::isEnableQtyIncrements()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::isQtyDecimal()
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
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::getId()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::getProductId()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::getStockId()
     */
    public function testGetIds()
    {
        $this->assertEquals(3, $this->stock->getId());
        $this->assertEquals(2, $this->stock->getProductId());
        $this->assertEquals(1, $this->stock->getStockId());
    }

    /**
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::getQty()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::getMinQty()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::getMinSaleQty()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::getMaxSaleQty()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::getQtyIncrements()
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
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::isUseConfigBackorders()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::isUseConfigEnableQtyInc()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::isUseConfigManageStock()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::isUseConfigMaxSaleQty()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::isUseConfigMinQty()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::isUseConfigMinSaleQty()
     * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject::isUseConfigNotifyStockQty()
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