<?php

namespace KickAss\MageSDK\Models;

use KickAss\MageSDK\V1\Directory\CurrencyInterface;
use KickAss\MageSDK\V1\StoreInterface;

class Store
{
    protected $configuration;
    protected $code;
    protected $storeApi;
    protected $currencyApi;
    protected $currencyInformation;

    /**
     * Store constructor.
     * @param string $code
     * @param StoreInterface $storeApi
     * @param CurrencyInterface $currencyApi
     */
    public function __construct(string $code, StoreInterface $storeApi, CurrencyInterface $currencyApi)
    {
        $this->code = $code;
        $this->storeApi = $storeApi;
        $this->currencyApi = $currencyApi;
    }

    /**
     * @return \stdClass
     */
    public function getFullConfiguration(): \stdClass
    {
        if (!$this->configuration) {
            $this->configuration = $this->storeApi->getByStoreCode($this->code);
        }
        return $this->configuration;
    }

    /**
     * @return mixed
     */
    public function getConfigValue($key)
    {
        return $this->getFullConfiguration()->$key ?? null ;
    }

    /**
     * @return int
     */
    public function getStoreId()
    {
        return (int)$this->getConfigValue('id');
    }

    /**
     * @return string
     */
    public function getStoreCode()
    {
        return (string)$this->getConfigValue('code');
    }

    public function getCurrencyInformation()
    {
        if (!$this->currencyInformation) {
            $this->currencyInformation = $this->currencyApi->getStoreCurrencyInformation();
        }
        return $this->currencyInformation;
    }
}
