<?php

namespace Integrations\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Integrations\MageSDK\V1\ConfigMock;
use Sandermangel\MageSDK\V1\Integration\AdminToken;

/**
 * @covers \Sandermangel\MageSDK\V1\Integration\AdminToken
 */
class AdminTokenTest extends TestCase
{

    /**
     * @covers \Sandermangel\MageSDK\V1\Integration\AdminToken::retrieve
     */
    public function testRetrieve()
    {
        $config = new ConfigMock();
        $customerToken = new AdminToken($config);
        $customerToken->retrieve($config->getAdminUsername(), $config->getAdminPassword());
    }
}