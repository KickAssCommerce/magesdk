<?php

namespace Tests\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\Models\Store;
use Sandermangel\MageSDK\V1\Store\ConfigInterface;

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
     * @covers \Sandermangel\MageSDK\Models\Store::getConfigValue()
     */
    public function testGetConfigValue()
    {
        $this->assertEquals('en_US', $this->store->getConfigValue('locale'));
    }

    /**
     * @covers \Sandermangel\MageSDK\Models\Store::getConfigValue()
     */
    public function testGetUndefinedConfigValue()
    {
        $this->assertNull($this->store->getConfigValue('x-test-foobar'));
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