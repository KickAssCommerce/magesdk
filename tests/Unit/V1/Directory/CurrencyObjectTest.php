<?php

namespace Tests\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\V1\Directory\CurrencyObject;
use Sandermangel\MageSDK\V1\Directory\ExchangeRateObject;

/**
 * @covers \Sandermangel\MageSDK\V1\Directory\CurrencyObject
 */
class CurrencyObjectTest extends TestCase
{
    /**
     * @var CurrencyObject
     */
    protected $currency;

    public function setUp()
    {
        $data = new \stdClass();
        $data->base_currency_code = 'EUR';
        $data->base_currency_symbol = '€';
        $data->default_display_currency_code = 'EUR';
        $data->default_display_currency_symbol = '€';
        $data->available_currency_codes = ['EUR'];

        $rate = new \stdClass();
        $rate->currency_to = 'EUR';
        $rate->rate = -1.5;
        $rate->extension_attributes = [];
        $data->exchange_rates = [$rate];

        $data->extension_attributes = [];

        $this->currency = new CurrencyObject($data);
    }

    /**
     * @covers \Sandermangel\MageSDK\V1\Directory\CurrencyObject::getBaseCurrencyCode()
     */
    public function testGetBaseCurrencyCode()
    {
        $this->assertEquals('EUR', $this->currency->getBaseCurrencyCode());
    }

    /**
     * @covers \Sandermangel\MageSDK\V1\Directory\CurrencyObject::getBaseCurrencySymbol()
     */
    public function testGetBaseCurrencySymbol()
    {
        $this->assertEquals('€', $this->currency->getBaseCurrencySymbol());
    }

    /**
     * @covers \Sandermangel\MageSDK\V1\Directory\CurrencyObject::getDisplayCurrencyCode()
     */
    public function testGetDisplayCurrencyCode()
    {
        $this->assertEquals('EUR', $this->currency->getDisplayCurrencyCode());
    }

    /**
     * @covers \Sandermangel\MageSDK\V1\Directory\CurrencyObject::getDisplayCurrencySymbol()
     */
    public function testGetDisplayCurrencySymbol()
    {
        $this->assertEquals('€', $this->currency->getDisplayCurrencySymbol());
    }

    /**
     * @covers \Sandermangel\MageSDK\V1\Directory\CurrencyObject::getCurrencyCodes()
     */
    public function testGetCurrencyCodes()
    {
        $this->assertEquals(['EUR'], $this->currency->getCurrencyCodes());
    }

    /**
     * @covers \Sandermangel\MageSDK\V1\Directory\CurrencyObject::getExchangeRates()
     */
    public function testGetExchangeRates()
    {
        $this->assertInstanceOf(ExchangeRateObject::class, $this->currency->getExchangeRates()[0]);
    }
}