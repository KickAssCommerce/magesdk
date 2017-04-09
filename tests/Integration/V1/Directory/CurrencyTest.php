<?php

namespace Integrations\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Integrations\MageSDK\V1\ConfigMock;
use Sandermangel\MageSDK\V1\Directory\Currency;
use Sandermangel\MageSDK\V1\Directory\ExchangeRateObject;

/**
 * @covers \Sandermangel\MageSDK\V1\Directory\currency
 */
class CurrencyTest extends TestCase
{

    /**
     * @covers \Sandermangel\MageSDK\V1\Directory\Currency::getStoreCurrencyInformation()
     */
    public function testGetStoreCurrencyInformation()
    {
        $currency = new Currency(new ConfigMock());
        $data = $currency->getStoreCurrencyInformation();

        $this->assertEquals('EUR', $data->getBaseCurrencyCode());
        $this->assertEquals('€', $data->getBaseCurrencySymbol());
        $this->assertEquals('EUR', $data->getDisplayCurrencyCode());
        $this->assertEquals(['EUR'], array_values($data->getCurrencyCodes()));

        /** @var ExchangeRateObject $firstExchangeRate */
        $firstExchangeRate = $data->getExchangeRates()[0];
        $this->assertEquals('EUR', $firstExchangeRate->getCurrencyCode());
        $this->assertInstanceOf(ExchangeRateObject::class, $firstExchangeRate);
    }
}
