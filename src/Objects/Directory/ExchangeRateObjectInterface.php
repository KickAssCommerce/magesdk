<?php

namespace KickAss\MageSDK\Objects\Directory;

/**
 * Magento V1 directoryCurrencyInformationAcquirerV1 API exchange rate object
 *
 * @package KickAss\MageSDK
 */
interface ExchangeRateObjectInterface
{
    /**
     * return the conversion rate for the target currency
     * @return float
     */
    public function getRate() : float;

    /**
     * return the identifier code of the target currency
     * @return string
     */
    public function getCurrencyCode() : string;

    /**
     * returns an array of 3rd party added attributes
     * @return array
     */
    public function getExtensionAttributes() : array;
}