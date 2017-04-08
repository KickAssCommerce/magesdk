<?php

namespace Tests\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\API\ApiException;
use Sandermangel\MageSDK\Api\Client;
use Tests\MageSDK\ConfigMock;

/**
 * @covers \Sandermangel\MageSDK\API\Client
 */
class ClientTest extends TestCase
{

    /**
     * @covers \Sandermangel\MageSDK\API\Client::__construct()
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
     * @covers \Sandermangel\MageSDK\API\Client::prepareHeaders()
     */
    public function testPrepareHeaders()
    {
        $client = new Client(new ConfigMock(), 'GET', 'testendpoint', [], [
            'x-test-header' => 'testvalue'
        ]);

        $headers = $client->prepareHeaders();

        $this->assertContains('Authorization: Bearer {{token}}', $headers, 'Headers do not contain an Authorization');
        $this->assertContains('Accept: JSON', $headers, 'Headers do not contain an accept request format');
        $this->assertContains('Content-Type: application/JSON', $headers, 'Headers do not contain an accept response format');
        $this->assertContains('x-test-header: testvalue', $headers, 'Headers do not contain the x-test-header custom header');
    }

    /**
     * @covers \Sandermangel\MageSDK\API\Client::getApiEndpoint()
     */
    public function testGetApiEndpoint()
    {
        $client = new Client(new ConfigMock(), 'GET', '/get/', [], []);

        $this->assertEquals('https://httpbin.org/get/', $client->getApiEndpoint());
    }

    /**
     * @covers \Sandermangel\MageSDK\API\Client::getPreparedQueryString()
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

    /***
     * NOTE: BELOW TESTS NEED INTERNET ACCESS
     * IF NOT AVAILABLE THEY WILL BE MARKED AS INCOMPLETE
     */

    /**
     * @covers \Sandermangel\MageSDK\API\Client::executeCall()
     */
    public function testExecuteGetCall()
    {
        $this->checkHttpbinConnection();

        $client = new Client(new ConfigMock(), 'GET', '/get', [
            'testkey' => 'testvariable',
            'testassockey' => [
                'testmultikey' => 'testmultivalue'
            ]
        ], []);

        $data = $client->executeCall();

        $this->assertEquals('200', $data['httpcode']);
        $this->assertEquals('testmultivalue', $data['body']->args->{'testassockey[testmultikey]'});
        $this->assertEquals('x-magesdk-agent-v1', $data['body']->headers->{'User-Agent'});
        $this->assertEquals('application/JSON', $data['body']->headers->{'Content-Type'});
    }

    /**
     * @covers \Sandermangel\MageSDK\API\Client::executeCall()
     */
    public function testExecutePostCall()
    {
        $this->checkHttpbinConnection();

        $client = new Client(new ConfigMock(), 'POST', '/post', [
            'testkey' => 'testvariable',
            'testassockey' => [
                'testmultikey' => 'testmultivalue'
            ]
        ], []);

        $data = $client->executeCall();

        $this->assertEquals('200', $data['httpcode']);
        $this->assertEquals('testkey=testvariable&testassockey%5Btestmultikey%5D=testmultivalue', $data['body']->data);
        $this->assertEquals('https://httpbin.org/post', $data['body']->url);
    }

    /**
     * @covers \Sandermangel\MageSDK\API\Client::executeCall()
     */
    public function testExecuteDeleteCall()
    {
        $this->checkHttpbinConnection();

        $client = new Client(new ConfigMock(), 'DELETE', '/delete', [
            'sku' => 'test-sku'
        ], []);

        $data = $client->executeCall();

        $this->assertEquals('200', $data['httpcode']);
        $this->assertEquals('sku=test-sku', $data['body']->data);
        $this->assertEquals('https://httpbin.org/delete', $data['body']->url);
    }

    /**
     * @covers \Sandermangel\MageSDK\API\Client::executeCall()
     */
    public function testExecutePutCall()
    {
        $this->checkHttpbinConnection();

        $client = new Client(new ConfigMock(), 'PUT', '/put', [
            'sku' => 'test-sku'
        ], []);

        $data = $client->executeCall();

        $this->assertEquals('200', $data['httpcode']);
        $this->assertEquals('sku=test-sku', $data['body']->data);
        $this->assertEquals('https://httpbin.org/put', $data['body']->url);
    }

    /**
     * Test if we can make a connection to httpbin, if not mark tests as incomplete
     */
    public function checkHttpbinConnection()
    {
        $testHeaders = get_headers('https://httpbin.org/');
        if (false === strpos($testHeaders[0], ' 2')) {
            $this->markTestIncomplete('Test could not connect to httpbin.org, skipped as incomplete');
        }
    }
}