<?php

namespace KickAss\MageSDK\Api;

use KickAss\MageSDK\ConfigInterface;

/**
 * API client class
 *
 * code handling the actual call to the remote API server
 *
 * @package KickAss\MageSDK
 */
interface ClientInterface
{
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
    public function __construct(ConfigInterface $config, string $method, string $path, $data, array $headers);

    /**
     * make the actual cURL call to the API endpoint
     * @throws ApiException when it could not retrieve the requested URL with a 20x status code
     */
    public function executeCall() : array;

    /**
     * Prepare cURL headers by taking optional headers and adding required default ones.
     * Added default headers are
     * - Authorization
     * - Accept (accepted request type JSON)
     * - Content-Type (accepted return type JSON)
     *
     * @return array
     */
    public function prepareHeaders() : array;

    /**
     * returns the fully configured API endpoint url
     * @return string
     */
    public function getApiEndpoint() : string;

    /**
     * turn the data into a string to send with request
     * @return string
     */
    public function getPreparedQueryString() : string;
}