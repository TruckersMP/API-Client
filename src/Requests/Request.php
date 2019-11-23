<?php

namespace TruckersMP\Requests;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Http\Client\Exception\HttpException;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use TruckersMP\ApiErrorHandler;

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
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function call(): array
    {
        $request = $this->message->createRequest('GET', $this->url . $this->getEndpoint());
        $result = null;

        try {
            $result = $this->adapter->sendRequest($request);
        } catch (HttpException $exception) {
            ApiErrorHandler::check($exception->getResponse()->getBody(), $exception->getCode());
        }

        return json_decode((string)$result->getBody(), true, 512, JSON_BIGINT_AS_STRING);
    }
}
