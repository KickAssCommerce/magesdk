<?php

namespace Tests\MageSDK;

use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\Config;
use KickAss\MageSDK\ConfigInterface;

/**
 * @covers \KickAss\MageSDK\Config
 */
class ConfigTest extends TestCase
{
    /**
     * @var ConfigInterface
     */
    protected $config;

    /**
     * @covers \KickAss\MageSDK\Config::__construct
     */
    public function testConstructor()
    {
        $errorString = '';
        try {
            $this->config = new Config(__DIR__ . '/');
        } catch(\Exception $error) {
            $errorString = $error->getMessage();
        }

        $this->assertEquals('', $errorString, "No error expected while loading config, {$errorString} given");
    }

    /**
     * @covers \KickAss\MageSDK\Config::getBaseUrl()
     */
    public function testGetBaseUrl()
    {
        if (!$this->config) {
            $this->markTestIncomplete('No config object found');
        }

        $this->assertEquals('http://domain.com/', $this->config->getBaseUrl());
    }
}