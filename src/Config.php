<?php

namespace Sandermangel\MageSDK;

use Dotenv\Dotenv;

/**
 * Configuration retrieval class
 *
 * Generic config class returns settings such as an API base url
 * for use in the library
 *
 * @package Sandermangel\MageSDK
 */
class Config implements ConfigInterface
{
    /**
     * set the path from where the env file is loaded on initialization
     *
     * @param string $path
     */
    public function __construct($path = __DIR__ . '/../')
    {
        $env = new Dotenv($path);
        $env->load();
    }

    /**
     * getValue returns the value of a config value by key
     *
     * @param string $key
     * @return string|null
     */
    public function getValue(string $key):string
    {
        return getenv($key);
    }

    /**
     * retrieve the configured API endpoint base url
     * @return string
     */
    public function getBaseUrl():string
    {
        return $this->getValue('API_BASE_URL');
    }

    /**
     * retrieve the configured API admin or customer token
     * @return string
     */
    public function getApiToken():string
    {
        return $this->getValue('API_TOKEN');
    }

    /**
     * retrieve the configured API store code to use
     * @return string
     */
    public function getApiStoreCode():string
    {
        return $this->getValue('API_STORE_CODE');
    }
}
