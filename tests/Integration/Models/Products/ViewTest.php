<?php

namespace Integrations\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Models\Products\View as ProductView;
use KickAss\MageSDK\Config;

/**
 * @covers \KickAss\MageSDK\Models\Products\View
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
     * @covers \KickAss\MageSDK\Models\Store::getStoreCode()
     * @covers \KickAss\MageSDK\Models\Store::getStoreId()
     */
    public function testGetStoreValues()
    {
        $isInStock = $this->product->getStockModel()->getIsInStock();
        var_dump($isInStock);
    }
}