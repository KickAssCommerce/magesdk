<?php

namespace Tests\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Objects\Directory\CurrencyObject;
use KickAss\MageSDK\Objects\Directory\ExchangeRateObject;

/**
 * @covers \KickAss\MageSDK\Objects\Directory\CurrencyObject
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
     * @covers \KickAss\MageSDK\Objects\Directory\CurrencyObject::getBaseCurrencyCode()
     */
    public function testGetBaseCurrencyCode()
    {
        $this->assertEquals('EUR', $this->currency->getBaseCurrencyCode());
    }

    /**
     * @covers \KickAss\MageSDK\Objects\Directory\CurrencyObject::getBaseCurrencySymbol()
     */
    public function testGetBaseCurrencySymbol()
    {
        $this->assertEquals('€', $this->currency->getBaseCurrencySymbol());
    }

    /**
     * @covers \KickAss\MageSDK\Objects\Directory\CurrencyObject::getDisplayCurrencyCode()
     */
    public function testGetDisplayCurrencyCode()
    {
        $this->assertEquals('EUR', $this->currency->getDisplayCurrencyCode());
    }

    /**
     * @covers \KickAss\MageSDK\Objects\Directory\CurrencyObject::getDisplayCurrencySymbol()
     */
    public function testGetDisplayCurrencySymbol()
    {
        $this->assertEquals('€', $this->currency->getDisplayCurrencySymbol());
    }

    /**
     * @covers \KickAss\MageSDK\Objects\Directory\CurrencyObject::getCurrencyCodes()
     */
    public function testGetCurrencyCodes()
    {
        $this->assertEquals(['EUR'], $this->currency->getCurrencyCodes());
    }

    /**
     * @covers \KickAss\MageSDK\Objects\Directory\CurrencyObject::getExchangeRates()
     */
    public function testGetExchangeRates()
    {
        $this->assertInstanceOf(ExchangeRateObject::class, $this->currency->getExchangeRates()[0]);
    }
}