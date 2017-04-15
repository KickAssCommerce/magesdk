<?php

namespace Tests\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\V1\Directory\CountryObject;

/**
 * @covers \KickAss\MageSDK\V1\Directory\CountryObject
 */
class CountryObjectTest extends TestCase
{
    /**
     * @var CountryObject
     */
    protected $country;

    public function setUp()
    {
        $data = new \stdClass();
        $data->id = 'US';
        $data->two_letter_abbreviation = 'US';
        $data->three_letter_abbreviation = 'USA';
        $data->full_name_locale = 'United States';
        $data->full_name_english = 'United States';

        $this->country = new CountryObject($data);
    }

    /**
     * @covers \KickAss\MageSDK\V1\Directory\CountryObject::getId()
     */
    public function testGetId()
    {
        $this->assertEquals('US', $this->country->getId());
    }

    /**
     * @covers \KickAss\MageSDK\V1\Directory\CountryObject::getIso2()
     */
    public function testGetIso2()
    {
        $this->assertEquals('US', $this->country->getIso2());
    }

    /**
     * @covers \KickAss\MageSDK\V1\Directory\CountryObject::getIso3()
     */
    public function testGetIso3()
    {
        $this->assertEquals('USA', $this->country->getIso3());
    }

    /**
     * @covers \KickAss\MageSDK\V1\Directory\CountryObject::getLocaleName()
     */
    public function testGetLocaleName()
    {
        $this->assertEquals('United States', $this->country->getLocaleName());
    }

    /**
     * @covers \KickAss\MageSDK\V1\Directory\CountryObject::getEnglishName()
     */
    public function testGetEnglishName()
    {
        $this->assertEquals('United States', $this->country->getEnglishName());
    }

    /**
     * @covers \KickAss\MageSDK\V1\Directory\CountryObject::getRegions()
     */
    public function testGetRegions()
    {
        $this->assertEquals([], $this->country->getRegions());
    }

    /**
     * @covers \KickAss\MageSDK\V1\Directory\CountryObject::getExtensionAttributes()
     */
    public function testGetExtensionAttributes()
    {
        $this->assertEquals([], $this->country->getExtensionAttributes());
    }
}