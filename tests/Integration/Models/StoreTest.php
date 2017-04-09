<?php

namespace Integrations\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\Models\Store;
use Sandermangel\MageSDK\Config;
use Sandermangel\MageSDK\V1\Store\Config as StoreConfig;

/**
 * @covers \Sandermangel\MageSDK\Models\Store
 */
class StoreTest extends TestCase
{
    /**
     * @var Store
     */
    protected $store;

    public function setUp()
    {
        $this->store = new Store('default', new StoreConfig(new Config()));
    }

    /**
     * @covers \Sandermangel\MageSDK\Models\Store::getStoreCode()
     * @covers \Sandermangel\MageSDK\Models\Store::getStoreId()
     */
    public function testGetStoreValues()
    {
        $this->assertEquals('default', $this->store->getStoreCode());
        $this->assertEquals(1, $this->store->getStoreId());
    }
}