<?php

namespace KickAss\MageSDK\Models;

use KickAss\MageSDK\V1\StoreInterface;

class Store
{
    protected $configuration;
    protected $code;
    protected $storeApi;

    /**
     * Store constructor.
     * @param string $code
     * @param StoreInterface $storeApi
     */
    public function __construct(string $code, StoreInterface $storeApi)
    {
        $this->code = $code;
        $this->storeApi = $storeApi;
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
}
