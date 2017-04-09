<?php

namespace Integrations\MageSDK\Api;

use PHPUnit\Framework\TestCase;
use Sandermangel\MageSDK\API\ApiException;
use Sandermangel\MageSDK\Api\Client;

/**
 * @covers \Sandermangel\MageSDK\API\Client
 */
class ClientTest extends TestCase
{
    /**
     * @covers \Sandermangel\MageSDK\API\Client::executeCall()
     */
    public function testExecuteGetCall()
    {
        $data = [];
        try {
            $client = new Client(new ConfigMock(), 'GET', '/get', [
                'testkey' => 'testvariable',
                'testassockey' => [
                    'testmultikey' => 'testmultivalue'
                ]
            ], []);

            $data = $client->executeCall();
        } catch (ApiException $error) {
            $this->markTestSkipped($error->getMessage());
        }

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
        $data = [];
        try {
            $client = new Client(new ConfigMock(), 'POST', '/post', [
                'testkey' => 'testvariable',
                'testassockey' => [
                    'testmultikey' => 'testmultivalue'
                ]
            ], []);

            $data = $client->executeCall();
        } catch (ApiException $error) {
            $this->markTestSkipped($error->getMessage());
        }

        $this->assertEquals('200', $data['httpcode']);
        $this->assertEquals('testkey=testvariable&testassockey%5Btestmultikey%5D=testmultivalue', $data['body']->data);
        $this->assertEquals('https://httpbin.org/post', $data['body']->url);
    }

    /**
     * @covers \Sandermangel\MageSDK\API\Client::executeCall()
     */
    public function testExecuteDeleteCall()
    {
        $data = [];
        try {
            $client = new Client(new ConfigMock(), 'DELETE', '/delete', [
                'sku' => 'test-sku'
            ], []);

            $data = $client->executeCall();
        } catch (ApiException $error) {
            $this->markTestSkipped($error->getMessage());
        }

        $this->assertEquals('200', $data['httpcode']);
        $this->assertEquals('sku=test-sku', $data['body']->data);
        $this->assertEquals('https://httpbin.org/delete', $data['body']->url);
    }

    /**
     * @covers \Sandermangel\MageSDK\API\Client::executeCall()
     */
    public function testExecutePutCall()
    {
        $data = [];
        try {
            $client = new Client(new ConfigMock(), 'PUT', '/put', [
                'sku' => 'test-sku'
            ], []);

            $data = $client->executeCall();
        } catch (ApiException $error) {
            $this->markTestSkipped($error->getMessage());
        }

        $this->assertEquals('200', $data['httpcode']);
        $this->assertEquals('sku=test-sku', $data['body']->data);
        $this->assertEquals('https://httpbin.org/put', $data['body']->url);
    }
}