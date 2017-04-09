<?php

namespace Sandermangel\MageSDK\Api;

use Sandermangel\MageSDK\Config;
use Sandermangel\MageSDK\ConfigInterface;
use Sandermangel\MageSDK\Api\ApiException;

/**
 * API client class
 *
 * code handling the actual call to the remote API server
 *
 * @package Sandermangel\MageSDK
 */
class Client
{
    /**
     * @var string
     */
    protected $method;
    /**
     * @var string
     */
    protected $path;
    /**
     * @var array
     */
    protected $data;
    /**
     * @var array
     */
    protected $headers;
    /**
     * @var ConfigInterface
     */
    protected $config;

    /**
     * Client constructor specifying the arguments required for making
     * the class like method, path and data
     *
     * @param ConfigInterface $config
     * @param string $method Either GET, POST, DELETE or PUT
     * @param string $path Path postfixed to base url
     * @param array|string $data Data parsed to API
     * @param array $headers associative array with $headerName => $headerValue
     * @throws ApiException
     */
    public function __construct(ConfigInterface $config, string $method, string $path, $data, array $headers)
    {
        $this->method = strtoupper($method);
        $this->path = $path;
        $this->data = $data;
        $this->headers = $headers;
        $this->config = $config;

        if (!in_array($this->method, ['GET','POST','PUT','DELETE'], true)) {
            throw new ApiException("Method should be either GET, POST, PUT or DELETE. {$this->method} given");
        }
    }

    /**
     * make the actual cURL call to the API endpoint
     * @throws ApiException when it could not retrieve the requested URL with a 20x status code
     */
    public function executeCall():array
    {
        $headerParams = $this->prepareHeaders();
        $endpointUrl = $this->getApiEndpoint();
        $data = $this->getPreparedQueryString();

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT_MS, 2000);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headerParams);
        curl_setopt($curl, CURLOPT_USERAGENT, 'x-magesdk-agent-v1');

        if ($this->method === 'GET') {
            $endpointUrl .= '?' . $data;
            $endpointUrl = trim($endpointUrl, '?');
        } elseif ($this->method === 'POST') {
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        } else {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $this->method);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        }
        curl_setopt($curl, CURLOPT_URL, $endpointUrl);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);

        $responseBody = curl_exec($curl);
        $responseInfo = curl_getinfo($curl);
        $responseError = curl_error($curl);
        curl_close($curl);

        if ($responseInfo['http_code'] >= 200 && $responseInfo['http_code'] <= 299) {
            return [
                'body' => json_decode($responseBody),
                'httpcode' => $responseInfo['http_code']
            ];
        } elseif ($responseInfo['http_code'] === 401) {
            $body = json_decode($responseBody);
            throw new ApiException($body->message);
        } else {
            throw new ApiException("{$endpointUrl} replied with".
                "status code {$responseInfo['http_code']}".
                ", error: {$responseError}, body: {$responseBody}");
        }
    }

    /**
     * Prepare cURL headers by taking optional headers and adding required default ones.
     * Added default headers are
     * - Authorization
     * - Accept (accepted request type JSON)
     * - Content-Type (accepted return type JSON)
     *
     * @return array
     */
    public function prepareHeaders():array
    {
        $config = new Config();
        $headers = array_merge([
            'Authorization' => "Bearer {$config->getApiToken()}",
            'Content-Type' => 'application/json'
        ], $this->headers);

        $headerParams = [];
        array_walk($headers, function ($value, $headerName) use (&$headerParams) {
            $headerParams[] = "{$headerName}: {$value}";
        });

        return $headerParams;
    }

    /**
     * returns the fully configured API endpoint url
     * @return string
     */
    public function getApiEndpoint():string
    {
        return rtrim($this->config->getBaseUrl(), '/') . '/' . ltrim($this->path, '/');
    }

    /**
     * turn the data into a string to send with request
     * @return string
     */
    public function getPreparedQueryString():string
    {
        return is_array($this->data) ? http_build_query($this->data, '', '&') : $this->data ;
    }
}
