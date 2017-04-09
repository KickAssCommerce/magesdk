<?php

namespace Sandermangel\MageSDK\V1\Directory;

use Sandermangel\MageSDK\V1\AbstractObject;

/**
 * Magento V1 directoryCountryInformationAcquirer API exchange rate object
 *
 * @package Sandermangel\MageSDK
 */
class ExchangeRateObject extends AbstractObject
{
    protected $rate;
    protected $currencyCode;

    /**
     * Converts V1 api data into a structured object
     *
     * @param \stdClass $apiData
     */
    public function __construct($apiData)
    {
        $this->currencyCode = (string)$apiData->currency_to;
        $this->rate = (float)$apiData->rate;
        $this->extensionAttributes = $apiData->extension_attributes ?? [] ;
    }

    /**
     * return the conversion rate for the target currency
     * @return float
     */
    public function getRate(): float
    {
        return $this->rate;
    }

    /**
     * return the identifier code of the target currency
     * @return string
     */
    public function getCurrencyCode(): string
    {
        return $this->currencyCode;
    }
}