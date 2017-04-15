<?php

namespace Tests\MageSDK\V1\Products;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\V1\Products\ProductsObject;

/**
 * @covers \Sandermangel\MageSDK\V1\Products\StockItemObject
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
}