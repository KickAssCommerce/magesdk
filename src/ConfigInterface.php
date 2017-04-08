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
     * getValue returns the value of a config value by key
     *
     * @param string $key
     * @return string|null
     */
    public function getValue(string $key):string;
}