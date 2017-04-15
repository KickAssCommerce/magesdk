<?php

namespace KickAss\MageSDK\Models;

use KickAss\MageSDK\V1\Store\ConfigInterface;

class Store
{
    protected $configuration;
    protected $code;
    protected $storeConfigApi;

    /**
     * Store constructor.
     * @param string $code
     * @param ConfigInterface $storeConfigApi
     */
    public function __construct(string $code, ConfigInterface $storeConfigApi)
    {
        $this->code = $code;
        $this->storeConfigApi = $storeConfigApi;
    }

    /**
     * @return \stdClass
     */
    public function getFullConfiguration(): \stdClass
    {
        if (!$this->configuration) {
            $this->configuration = $this->storeConfigApi->getByStoreCode($this->code);
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
