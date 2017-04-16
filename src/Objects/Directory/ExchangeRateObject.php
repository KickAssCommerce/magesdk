<?php

namespace KickAss\MageSDK\Objects\Directory;

use KickAss\MageSDK\Objects\ObjectTrait;

/**
 * Magento V1 directoryCurrencyInformationAcquirerV1 API exchange rate object
 *
 * @package KickAss\MageSDK
 */
class ExchangeRateObject implements ExchangeRateObjectInterface
{
    use ObjectTrait;

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
