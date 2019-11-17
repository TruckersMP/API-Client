<?php

namespace TruckersMP\Helpers;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Http\Message\MessageFactory\GuzzleMessageFactory;

class Request
{
    /**
     * @var \Http\Message\MessageFactory\GuzzleMessageFactory
     */
    protected $message;

    /**
     * @var string
     */
    protected $apiEndpoint;

    /**
     * @var \Http\Adapter\Guzzle6\Client
     */
    protected $adapter;

    /**
     * RequestHelper constructor.
     *
     * @param       $apiEndpoint
     * @param array $config
     *
     */
    public function __construct($apiEndpoint, array $config)
    {
        $this->message = new GuzzleMessageFactory();
        $this->apiEndpoint = $apiEndpoint;
        $this->adapter = new GuzzleAdapter(new GuzzleClient($config));
    }

    /**
     * @param string $uri URI of API method
     * @return array
     * @throws \Http\Client\Exception
     */
    public function execute(string $uri): array
    {
        $request = $this->message->createRequest('GET', $this->apiEndpoint . $uri);
        $result = $this->adapter->sendRequest($request);

        return json_decode((string)$result->getBody(), true, 512, JSON_BIGINT_AS_STRING);
    }
}
