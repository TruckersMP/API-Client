<?php

namespace TruckersMP\APIClient\Requests;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request as GuzzleRequest;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Client;
use TruckersMP\APIClient\Exceptions\ApiErrorException;

abstract class Request
{
    /**
     * The API endpoint URL to retrieve the data form.
     */
    private const API_ENDPOINT = 'api.truckersmp.com';

    /**
     * The version of the API to use.
     */
    private const API_VERSION = 'v2';

    /**
     * The instance of the guzzle client.
     *
     * @var GuzzleClient
     */
    protected $client;

    /**
     * Create a new Request instance.
     *
     * @return void
     */
    public function __construct()
    {
        $config = Client::config();
        $config['base_uri'] = 'https://' . self::API_ENDPOINT . '/' . self::API_VERSION . '/';

        $this->client = new GuzzleClient($config);
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    abstract public function getEndpoint(): string;

    /**
     * Get the data for the request.
     *
     * @return mixed
     */
    abstract public function get();

    /**
     * Send the request to the API endpoint and get the result.
     *
     * @return array
     *
     * @throws ClientExceptionInterface
     * @throws ApiErrorException
     */
    public function send(): array
    {
        $request = new GuzzleRequest('GET', $this->getEndpoint());
        $requestResponse = $this->client->sendRequest($request);

        $response = json_decode($requestResponse->getBody(), true, 512, JSON_BIGINT_AS_STRING);

        if ($this->hasError($response)) {
            $message = $response['descriptor'] ?? $response['response'];

            throw new ApiErrorException($message, $requestResponse->getStatusCode());
        }

        return $response;
    }

    /**
     * Check if the response contains an error.
     *
     * @param $response
     * @return bool
     */
    protected function hasError($response): bool
    {
        if (! isset($response['error'])) {
            return false;
        }

        if (is_string($response['error'])) {
            return $response['error'] === 'true';
        }

        return $response['error'];
    }
}
