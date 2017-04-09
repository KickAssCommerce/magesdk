<?php

namespace Tests\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\V1\Directory\RegionObject;
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
        $data = new \stdClass();
        $data->item_id = 3;
        $data->product_id = 2;
        $data->stock_id = 1;
        $data->qty = 5;
        $data->is_in_stock = true;
        $data->is_qty_decimal = true;
        $data->show_default_notification_message = true;
        $data->use_config_min_qty = true;
        $data->min_qty = 2;
        $data->use_config_min_sale_qty = 0;
        $data->min_sale_qty = 2;
        $data->use_config_max_sale_qty = true;
        $data->max_sale_qty = 10;
        $data->use_config_backorders = true;
        $data->backorders = 0;
        $data->use_config_notify_stock_qty = true;
        $data->notify_stock_qty = 0;
        $data->use_config_qty_increments = true;
        $data->qty_increments = 2;
        $data->use_config_enable_qty_inc = true;
        $data->enable_qty_increments = true;
        $data->use_config_manage_stock = true;
        $data->manage_stock = true;
        $data->low_stock_date = (New \DateTime('now'))->format('Y-m-d');
        $data->is_decimal_divided = true;
        $data->stock_status_changed_auto = 0;
        $data->extension_attributes = [];

        $this->stock = new StockItemObject($data);
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