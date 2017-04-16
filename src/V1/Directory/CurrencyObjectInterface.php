<?php

namespace KickAss\MageSDK\V1\Directory;

/**
 * Magento V1 directoryCurrencyInformationAcquirerV1 API currency object
 *
 * @package KickAss\MageSDK
 */
interface CurrencyObjectInterface
{
    /**
     * returns the stores currency code used as base currency
     * @return string
     */
    public function getBaseCurrencyCode() : string;

    /**
     * returns the stores currency symbol used as base currency
     * @return string
     */
    public function getBaseCurrencySymbol() : string;

    /**
     * returns the stores currency symbol used as display currency
     * @return string
     */
    public function getDisplayCurrencySymbol() : string;

    /**
     * returns the stores currency code used as base currency
     * @return string
     */
    public function getDisplayCurrencyCode() : string;

    /**
     * returns the stores available exchange rates as array of ExchangeRateObjects
     * @return array
     */
    public function getExchangeRates() : array;

    /**
     * returns the stores available currencies
     * @return array
     */
    public function getCurrencyCodes() : array;

    /**
     * returns an array of 3rd party added attributes
     * @return array
     */
    public function getExtensionAttributes() : array;
}