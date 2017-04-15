<?php

namespace Integrations\MageSDK\Api;

use KickAss\MageSDK\Config;
use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\V1\Products;

/**
 * @covers \KickAss\MageSDK\V1\Products
 */
class ProductsTest extends TestCase
{

    /**
     * @covers \KickAss\MageSDK\V1\Products::getBySku()
     */
    public function testGetBySku()
    {
        $product = new Products(new Config());
        $object = $product->getBySku('24-MB01', 0, false, false);

        $this->assertEquals('24-MB01', $object->getSku());
    }
}