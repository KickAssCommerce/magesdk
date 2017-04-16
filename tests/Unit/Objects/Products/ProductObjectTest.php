<?php

namespace Tests\MageSDK\Objects\Products;

use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Objects\Products\ProductsObject;
use Tests\MageSDK\V1\Products\ProductApiMock;

/**
 * @covers \KickAss\MageSDK\Objects\Products\ProductsObject
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
     * @covers \KickAss\MageSDK\Objects\Products\ProductsObject::getSku
     */
    public function testSimpleGetters()
    {
        $this->assertEquals('24-MB01', $this->product->getSku());
    }
}