<?php

namespace Tests\MageSDK\Api;
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
    }

    /**
     * retrieve the configured API endpoint base url
     * @return string
     */
    public function getBaseUrl():string
    {
        return 'https://httpbin.org/';
    }

    /**
     * retrieve the configured API admin or customer token
     * @return string
     */
    public function getApiToken():string
    {
        return '';
    }
}