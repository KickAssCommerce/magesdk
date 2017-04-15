<?php

namespace Tests\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use KickAss\MageSDK\API\ApiException;
use KickAss\MageSDK\Api\Client;

/**
 * @covers \KickAss\MageSDK\API\Client
 */
class ClientTest extends TestCase
{

    /**
     * @covers \KickAss\MageSDK\API\Client::__construct()
     */
    public function testConstruct()
    {
        // testing errors thrown on incorrect headers
        $incorrectMethod = '';
        try {
            $client = new Client(new ConfigMock(), 'INCORRECT HEADER', 'testendpoint', [], []);
        } catch(ApiException $error) {
            $incorrectMethod = $error->getMessage();
        }

        $this->assertEquals('Method should be either GET, POST, PUT or DELETE. INCORRECT HEADER given', $incorrectMethod);

        // testing that method is capitalized, so accepting get instead of GET
        $typeSensitiveMethod = '';
        try {
            $client = new Client(new ConfigMock(), 'get', 'testendpoint', [], []);
        } catch(ApiException $error) {
            $typeSensitiveMethod = $error->getMessage();
        }

        $this->assertEquals('', $typeSensitiveMethod, 'it appears the method is not capitalized, constructor is not accepting \'get\' as valid method');
    }

    /**
     * @covers \KickAss\MageSDK\API\Client::prepareHeaders()
     */
    public function testPrepareHeaders()
    {
        $client = new Client(new ConfigMock(), 'GET', 'testendpoint', [], [
            'x-test-header' => 'testvalue'
        ]);

        $headers = $client->prepareHeaders();

        //$this->assertContains('Authorization: Bearer {{token}}', $headers, 'Headers do not contain an Authorization');
        $this->assertContains('Content-Type: application/json', $headers, 'Headers do not contain an accept response format');
        $this->assertContains('x-test-header: testvalue', $headers, 'Headers do not contain the x-test-header custom header');
    }

    /**
     * @covers \KickAss\MageSDK\API\Client::getApiEndpoint()
     */
    public function testGetApiEndpoint()
    {
        $client = new Client(new ConfigMock(), 'GET', '/get/', [], []);

        $this->assertEquals('https://httpbin.org/get/', $client->getApiEndpoint());
    }

    /**
     * @covers \KickAss\MageSDK\API\Client::getPreparedQueryString()
     */
    public function testGetPreparedQueryString()
    {
        $client = new Client(new ConfigMock(), 'GET', '', [
            'testkey' => 'testvariable',
            'testassockey' => [
                'testmultikey' => 'testmultivalue'
            ]
        ], []);

        $this->assertEquals('testkey=testvariable&testassockey%5Btestmultikey%5D=testmultivalue', $client->getPreparedQueryString());
    }
}