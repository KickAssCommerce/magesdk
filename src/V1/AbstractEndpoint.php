<?php

namespace KickAss\MageSDK\V1;

use KickAss\MageSDK\ConfigInterface;

/**
 * Magento V1 abstract endpoint class
 *
 * @package KickAss\MageSDK
 */
abstract class AbstractEndpoint
{

    /**
     * @var ConfigInterface
     */
    protected $config;

    /**
     * API Endpoint class constructor.
     * @param ConfigInterface $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->config = $config;
    }

    /**
     * returns the path of an API endpoint including version
     * @return string
     */
    public function getPath()
    {
        return 'V1/' . $this->path;
    }

    /**
     * returns the set config class
     * @return ConfigInterface
     */
    public function getConfig(): ConfigInterface
    {
        return $this->config;
    }
}
