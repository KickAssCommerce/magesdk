<?php

namespace Integrations\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\V1\Products;
use Integrations\MageSDK\V1\ConfigMock;

/**
 * @covers \Sandermangel\MageSDK\V1\Products
 */
class ProductsTest extends TestCase
{

    /**
     * @covers \Sandermangel\MageSDK\V1\Products::getBySku()
     */
    public function testGetBySku()
    {
        $product = new Products(new ConfigMock());
        $product->getBySku('24-MB01');
    }
}