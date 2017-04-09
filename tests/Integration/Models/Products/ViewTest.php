<?php

namespace Integrations\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\Models\Products\View as ProductView;
use Sandermangel\MageSDK\Config;

/**
 * @covers \Sandermangel\MageSDK\Models\Products\View
 */
class ViewTest extends TestCase
{
    /**
     * @var ProductView
     */
    protected $product;

    public function setUp()
    {
        $this->product = new ProductView('24-MB01', 0, new Config());
    }

    /**
     * @covers \Sandermangel\MageSDK\Models\Store::getStoreCode()
     * @covers \Sandermangel\MageSDK\Models\Store::getStoreId()
     */
    public function testGetStoreValues()
    {
        $isInStock = $this->product->getStockModel()->getIsInStock();
        var_dump($isInStock);
    }
}