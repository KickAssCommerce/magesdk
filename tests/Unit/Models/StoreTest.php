<?php

namespace Tests\MageSDK\Api;

use KickAss\MageSDK\Objects\Directory\CurrencyObject;
use KickAss\MageSDK\V1\Directory\Currency;
use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Models\Store;
use KickAss\MageSDK\V1\Store as StoreApi;
use KickAss\MageSDK\V1\StoreInterface;

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
        $currency = $this->getMockBuilder(Currency::class)
            ->disableOriginalConstructor()
            ->getMock();
        $currency->method('getStoreCurrencyInformation')
            ->willReturn(new CurrencyObject((object)[
                'base_currency_code' => 'EUR',
                'base_currency_symbol' => 'E',
                'default_display_currency_code' => 'EUR',
                'default_display_currency_symbol' => 'E',
                'available_currency_codes' => [
                    'EUR'
                ],
                'exchange_rates' => [(object)[
                    'currency_to' => 'EUR',
                    'rate' => 0,
                    'extension_attributes' => []
                ]],
                'extension_attributes' => []
            ]));

        $store = $this->getMockBuilder(StoreApi::class)
            ->disableOriginalConstructor()
            ->getMock();
        $store->method('getByStoreCode')
            ->willReturn((object)[
                'id' => 1,
                'code' => 'default',
                'locale' => 'en_US',
            ]);

        $this->store = new Store('default', $store, $currency);
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