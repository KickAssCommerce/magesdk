<?php

namespace Integrations\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\V1\Directory\Countries;
use Sandermangel\MageSDK\V1\Directory\CountryObject;
use Sandermangel\MageSDK\V1\Directory\RegionObject;
use Integrations\MageSDK\V1\ConfigMock;

/**
 * @covers \Sandermangel\MageSDK\V1\Directory\Countries
 */
class CountriesTest extends TestCase
{

    /**
     * @covers \Sandermangel\MageSDK\V1\Directory\Countries::getAll()
     */
    public function testGetAll()
    {
        $countries = new Countries(new ConfigMock());
        $list = $countries->getAll();

        $this->assertGreaterThan(1, count($list));
        $this->assertInstanceOf(CountryObject::class, reset($list));
    }

    /**
     * @covers \Sandermangel\MageSDK\V1\Directory\Countries::getById()
     */
    public function testGetById()
    {
        $countries = new Countries(new ConfigMock());
        $object = $countries->getById('US');

        $this->assertInstanceOf(CountryObject::class,$object);

        $this->assertEquals('US', $object->getId());
        $this->assertEquals('US', $object->getIso2());
        $this->assertEquals('USA', $object->getIso3());
        $this->assertEquals('United States', $object->getLocaleName());
        $this->assertEquals('United States', $object->getEnglishName());

        $this->assertCount(65, $object->getRegions());
        $this->assertInstanceOf(RegionObject::class, $object->getRegions()[0]);
    }
}