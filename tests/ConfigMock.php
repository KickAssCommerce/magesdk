<?php

namespace Tests\MageSDK;
use Dotenv\Dotenv;
use Sandermangel\MageSDK\ConfigInterface;

/**
 * Mock object for the config class
 *
 * @package Tests\MageSDK
 */
class ConfigMock implements ConfigInterface
{
    /**
     * set the path from where the env file is loaded on initialization
     */
    public function __construct()
    {
        $env = new Dotenv(__DIR__ . '/');
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
}