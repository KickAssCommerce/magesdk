<?php

namespace Integrations\MageSDK\V1;

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
        $env = new Dotenv(__DIR__ . '/../');
        $env->overload();
    }

    /**
     * retrieve the configured API endpoint base url
     * the projects base url is used since it performs an integration test
     * @return string
     */
    public function getBaseUrl():string
    {
        return getenv('API_BASE_URL');
    }

    /**
     * retrieve the configured API admin or customer token
     * @return string
     */
    public function getApiToken():string
    {
        return getenv('API_TOKEN');
    }

    /**
     * retrieve the configured API store code to use
     * @return string
     */
    public function getApiStoreCode():string
    {
        return getenv('API_STORE_CODE');
    }
}