<?php

namespace Sandermangel\MageSDK\Models;

use Sandermangel\MageSDK\V1\Store\ConfigInterface;

class Store
{
    protected $configuration;

    public function __construct(string $code, ConfigInterface $storeConfigApi)
    {
        $this->configuration = $storeConfigApi->getByStoreCode($code);
    }

    /**
     * @return \stdClass
     */
    public function getFullConfiguration(): \stdClass
    {
        return $this->configuration;
    }

    /**
     * @return mixed
     */
    public function getConfigValue($key)
    {
        return $this->configuration->$key ?? null ;
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