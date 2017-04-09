<?php

namespace Integrations\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Integrations\MageSDK\V1\ConfigMock;
use Sandermangel\MageSDK\V1\Integration\CustomerToken;

/**
 * @covers \Sandermangel\MageSDK\V1\Integration\CustomerToken
 */
class CustomerTokenTest extends TestCase
{

    /**
     * @covers \Sandermangel\MageSDK\V1\Integration\CustomerToken::retrieve
     */
    public function testRetrieve()
    {
        return;
        $customerToken = new CustomerToken(new ConfigMock());
        $customerToken->retrieve('sandermangel', 'Terranosrespuet01');
    }
}