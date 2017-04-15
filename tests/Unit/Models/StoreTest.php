<?php

namespace Tests\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Models\Store;
use KickAss\MageSDK\V1\Store\ConfigInterface;

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
        $this->store = new Store('default', new Class implements ConfigInterface {
            public function getByStoreCode(string $code): \stdClass
            {
                $object = new \stdClass();
                $object->id = 1;
                $object->code = 'default';
                $object->locale = 'en_US';
                return $object;
            }
        });
    }

    /**
     * @covers \KickAss\MageSDK\Models\Store::getConfigValue()
     */
    public function testGetConfigValue()
    {
        $this->assertEquals('en_US', $this->store->getConfigValue('locale'));
    }

    /**
     * @covers \KickAss\MageSDK\Models\Store::getConfigValue()
     */
    public function testGetUndefinedConfigValue()
    {
        $this->assertNull($this->store->getConfigValue('x-test-foobar'));
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