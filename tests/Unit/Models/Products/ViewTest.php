<?php

namespace Tests\MageSDK\Models\Products;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\Models\Products\View as ProductsView;
use Sandermangel\MageSDK\V1\Products;
use Sandermangel\MageSDK\V1\Products\ProductsObject;
use Tests\MageSDK\Api\ConfigMock;
use Tests\MageSDK\V1\Products\ProductApiMock;

/**
 * @covers \Sandermangel\MageSDK\Models\Products\View
 */
class ViewTest extends TestCase
{
    /**
     * @var ProductsView
     */
    protected $productView;

    public function setUp()
    {
        $configMock = new ConfigMock();
        $productApiData = new ProductApiMock();

        $productApi = $this->createMock(Products::class);
        $productApi->method('getBySku')
            ->willReturn(new ProductsObject($productApiData));

        $this->productView = new ProductsView('24-MB01', 0, $productApi, $configMock);
    }

    /**
     * @covers \Sandermangel\MageSDK\Models\Products\View::getCreatedAt
     * @covers \Sandermangel\MageSDK\Models\Products\View::getUpdatedAt
     */
    public function testDates()
    {
        $this->assertInstanceOf(\DateTime::class, $this->productView->getCreatedAt());
        $this->assertEquals('2016-02-01', $this->productView->getCreatedAt()->format('Y-m-d'));

        $this->assertInstanceOf(\DateTime::class, $this->productView->getUpdatedAt());
        $this->assertEquals('2017-04-15', $this->productView->getUpdatedAt()->format('Y-m-d'));
    }

}