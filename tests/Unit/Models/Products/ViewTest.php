<?php

namespace Tests\MageSDK\Models\Products;

use KickAss\MageSDK\Config;
use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Models\Products\View as ProductsView;
use KickAss\MageSDK\V1\Products;
use KickAss\MageSDK\V1\Products\ProductsObject;
use Tests\MageSDK\V1\Products\ProductApiMock;

/**
 * @covers \KickAss\MageSDK\Models\Products\View
 */
class ViewTest extends TestCase
{
    /**
     * @var ProductsView
     */
    protected $productView;

    public function setUp()
    {
        $config = $this->getMockBuilder(Config::class)
            ->disableOriginalConstructor()
            ->getMock();
        $config->method('getApiToken')
            ->willReturn('abcdefg');
        $config->method('getBaseUrl')
            ->willReturn('http://127.0.0.1/');
        $config->method('getApiStoreCode')
            ->willReturn('default');
        
        $productApiData = new ProductApiMock();

        $productApi = $this->createMock(Products::class);
        $productApi->method('getBySku')
            ->willReturn(new ProductsObject($productApiData));

        $this->productView = new ProductsView('24-MB01', 0, $productApi, $config);
    }

    /**
     * @covers \KickAss\MageSDK\Models\Products\View::getCreatedAt
     * @covers \KickAss\MageSDK\Models\Products\View::getUpdatedAt
     */
    public function testDates()
    {
        $this->assertInstanceOf(\DateTime::class, $this->productView->getCreatedAt());
        $this->assertEquals('2016-02-01', $this->productView->getCreatedAt()->format('Y-m-d'));

        $this->assertInstanceOf(\DateTime::class, $this->productView->getUpdatedAt());
        $this->assertEquals('2017-04-15', $this->productView->getUpdatedAt()->format('Y-m-d'));
    }

}