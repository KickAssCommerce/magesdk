<?php

namespace Tests\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\V1\Directory\ExchangeRateObject;

/**
 * @covers \Sandermangel\MageSDK\V1\Directory\ExchangeRateObject
 */
class ExchangeRateObjectTest extends TestCase
{
    /**
     * @var ExchangeRateObject
     */
    protected $exchangeRate;

    public function setUp()
    {
        $data = new \stdClass();
        $data->currency_to = 'EUR';
        $data->rate = -1.5;
        $data->extension_attributes = [];

        $this->exchangeRate = new ExchangeRateObject($data);
    }

    /**
     * @covers \Sandermangel\MageSDK\V1\Directory\ExchangeRateObject::getCurrencyCode()
     */
    public function testGetCurrencyCode()
    {
        $this->assertEquals('EUR', $this->exchangeRate->getCurrencyCode());
    }

    /**
     * @covers \Sandermangel\MageSDK\V1\Directory\ExchangeRateObject::getRate()
     */
    public function testGetRate()
    {
        $this->assertEquals(-1.5, $this->exchangeRate->getRate());
    }
}