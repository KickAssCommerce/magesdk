<?php

namespace KickAss\MageSDK\Objects\Directory;

use KickAss\MageSDK\Objects\ObjectTrait;

/**
 * Magento V1 directoryCurrencyInformationAcquirerV1 API currency object
 *
 * @package KickAss\MageSDK
 */
class CurrencyObject implements CurrencyObjectInterface
{
    use ObjectTrait;

    protected $baseCurrencyCode;
    protected $baseCurrencySymbol;
    protected $exchangeRates;
    protected $currencyCodes;
    protected $displayCurrencySymbol;
    protected $displayCurrencyCode;

    /**
     * Converts V1 api data into a structured object
     *
     * @param \stdClass $apiData
     */
    public function __construct($apiData)
    {
        $this->baseCurrencyCode = (string)$apiData->base_currency_code;
        $this->baseCurrencySymbol = (string)$apiData->base_currency_symbol;
        $this->displayCurrencyCode = (string)$apiData->default_display_currency_code;
        $this->displayCurrencySymbol = (string)$apiData->default_display_currency_symbol;
        $this->currencyCodes = (array)$apiData->available_currency_codes;
        $this->exchangeRates = (array)$apiData->exchange_rates;
        $this->extensionAttributes = $apiData->extension_attributes ?? [] ;

        $this->exchangeRates = array_map(function ($data) {
            return new ExchangeRateObject($data);
        }, $this->exchangeRates);
    }

    /**
     * returns the stores currency code used as base currency
     * @return string
     */
    public function getBaseCurrencyCode(): string
    {
        return $this->baseCurrencyCode;
    }

    /**
     * returns the stores currency symbol used as base currency
     * @return string
     */
    public function getBaseCurrencySymbol(): string
    {
        return $this->baseCurrencySymbol;
    }

    /**
     * returns the stores currency symbol used as display currency
     * @return string
     */
    public function getDisplayCurrencySymbol(): string
    {
        return $this->displayCurrencySymbol;
    }

    /**
     * returns the stores currency code used as base currency
     * @return string
     */
    public function getDisplayCurrencyCode(): string
    {
        return $this->displayCurrencyCode;
    }

    /**
     * returns the stores available exchange rates as array of ExchangeRateObjects
     * @return array
     */
    public function getExchangeRates(): array
    {
        return $this->exchangeRates;
    }

    /**
     * returns the stores available currencies
     * @return array
     */
    public function getCurrencyCodes(): array
    {
        return $this->currencyCodes;
    }
}
