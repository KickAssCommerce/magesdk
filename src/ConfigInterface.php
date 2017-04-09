<?php

namespace Sandermangel\MageSDK;

/**
 * Configuration retrieval interface
 *
 * @package Sandermangel\MageSDK
 */
interface ConfigInterface
{
    /**
     * retrieve the configured API endpoint base url
     * @return string
     */
    public function getBaseUrl():string;
    /**
     * retrieve the configured API admin or customer token
     * @return string
     */
    public function getApiToken():string;
    /**
     * retrieve the configured API store code to use
     * @return string
     */
    public function getApiStoreCode():string;
}
