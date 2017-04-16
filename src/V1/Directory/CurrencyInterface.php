<?php

namespace KickAss\MageSDK\V1\Directory;
use KickAss\MageSDK\Objects\Directory\CurrencyObjectInterface;

/**
 * Magento V1 directoryCurrencyInformationAcquirerV1 API
 *
 * @package KickAss\MageSDK
 */
interface CurrencyInterface
{
    /**
     * @return CurrencyObjectInterface
     * @throws \KickAss\MageSDK\Api\ApiException
     */
    public function getStoreCurrencyInformation() : CurrencyObjectInterface;
}