<?php

namespace Tests\MageSDK\Models\Products\Stock;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\Models\Products\Stock\View as StockView;
use Tests\MageSDK\Api\ConfigMock;
use Tests\MageSDK\Models\Products\ProductViewMock;

/**
 * @covers \Sandermangel\MageSDK\Models\Products\Stock\View
 */
class ViewTest extends TestCase
{
    /**
     * @var StockView
     */
    protected $stockModel;

    public function setUp()
    {
        $configMock = new ConfigMock();
        $productMock = new ProductViewMock('test', 0, $configMock);
        $this->stockModel = new StockView($productMock, 0, $configMock);
    }

    public function testIsInStock()
    {
        //var_dump($this->stockModel->getIsInStock());
    }

}