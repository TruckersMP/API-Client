<?php

namespace TruckersMP\Requests;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Http\Message\MessageFactory\GuzzleMessageFactory;

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
     * @var \Http\Message\MessageFactory\GuzzleMessageFactory
     */
    protected $message;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var \Http\Adapter\Guzzle6\Client
     */
    protected $adapter;

    /**
     * Create a new Request instance.
     *
     * @param  array  $config
     */
    public function __construct(array $config)
    {
        $this->message = new GuzzleMessageFactory();
        $this->adapter = new GuzzleAdapter(
            new GuzzleClient($config)
        );

        $this->url = 'https://' . self::API_ENDPOINT . '/' . self::API_VERSION . '/';
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
     * Call the API endpoint and get the result.
     *
     * @return  array
     * @throws \Http\Client\Exception
     */
    public function call(): array
    {
        $request = $this->message->createRequest('GET', $this->url . $this->getEndpoint());
        $result = $this->adapter->sendRequest($request);

        return json_decode((string)$result->getBody(), true, 512, JSON_BIGINT_AS_STRING);
    }
}
