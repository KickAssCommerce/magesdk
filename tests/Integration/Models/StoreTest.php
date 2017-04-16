<?php

namespace Integrations\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Models\Store;
use KickAss\MageSDK\Config;
use KickAss\MageSDK\V1\Store as StoreConfig;

/**
 * @covers \KickAss\MageSDK\Models\Store
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
     * @covers \KickAss\MageSDK\Models\Store::getStoreCode()
     * @covers \KickAss\MageSDK\Models\Store::getStoreId()
     */
    public function testGetStoreValues()
    {
        $this->assertEquals('default', $this->store->getStoreCode());
        $this->assertEquals(1, $this->store->getStoreId());
    }
}