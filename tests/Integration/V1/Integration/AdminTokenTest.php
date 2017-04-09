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
        return;
        $config = new ConfigMock();
        $adminToken = new AdminToken($config);
        $token = $adminToken->retrieve($config->getAdminUsername(), $config->getAdminPassword());

        var_dump($token);exit;
    }
}