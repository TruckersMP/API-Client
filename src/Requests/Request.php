<?php

namespace TruckersMP\APIClient\Requests;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Http\Client\Exception\HttpException;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\ApiErrorHandler;
use TruckersMP\APIClient\Client;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;

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
     * The current instance of the Guzzle message.
     *
     * @var GuzzleMessageFactory
     */
    protected $message;

    /**
     * The API URL to call.
     *
     * @var string
     */
    protected $url;

    /**
     * The current instance of the Guzzle client.
     *
     * @var GuzzleAdapter
     */
    protected $adapter;

    /**
     * Create a new Request instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->message = new GuzzleMessageFactory();
        $this->adapter = new GuzzleAdapter(
            new GuzzleClient(Client::config())
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
     * Send the request to the API endpoint and get the result.
     *
     * @return array
     *
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function send(): array
    {
        $request = $this->message->createRequest('GET', $this->url . $this->getEndpoint());
        $result = null;

        try {
            $result = $this->adapter->sendRequest($request);
        } catch (HttpException $exception) {
            ApiErrorHandler::check($exception->getResponse()->getBody(), $exception->getCode());
        }

        return json_decode((string) $result->getBody(), true, 512, JSON_BIGINT_AS_STRING);
    }
}
