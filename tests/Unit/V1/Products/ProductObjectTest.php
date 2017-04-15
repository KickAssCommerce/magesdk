<?php

namespace Tests\MageSDK\V1\Products;

use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\V1\Products\ProductsObject;

/**
 * @covers \KickAss\MageSDK\V1\Products\ProductsObject
 */
class ProductObjectTest extends TestCase
{
    /**
     * @var ProductsObject
     */
    protected $product;

    public function setUp()
    {
        $this->product = new ProductsObject(new ProductApiMock());
    }

    /**
     * @covers \KickAss\MageSDK\V1\Products\ProductsObject::getSku
     */
    public function testSimpleGetters()
    {
        $this->assertEquals('24-MB01', $this->product->getSku());
    }
}