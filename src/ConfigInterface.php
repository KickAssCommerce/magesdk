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
}