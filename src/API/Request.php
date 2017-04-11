<?php
/**
 * Created by PhpStorm.
 * Date: 11.04.2017
 * Time: 09:52.
 */

namespace TruckersMP\API;

use GuzzleHttp\Client as GuzzleClient;
use Http\Adapter\Guzzle6\Client as GuzzleAdapter;
use Http\Message\MessageFactory\GuzzleMessageFactory;

class Request
{
    /**
     * @var \Http\Message\MessageFactory\GuzzleMessageFactory
     */
    private $message;

    /**
     * @var string
     */
    private $apiEndpoint;

    /**
     * @var \Http\Adapter\Guzzle6\Client
     */
    private $adapter;

    /**
     * Request constructor.
     *
     * @param       $apiEndpoint
     * @param array $config
     */
    public function __construct($apiEndpoint, $config = [])
    {
        $this->message = new GuzzleMessageFactory();

        $this->apiEndpoint = $apiEndpoint;
        $this->adapter = new GuzzleAdapter(new GuzzleClient($config));
    }

    /**
     * @param $uri
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function execute($uri)
    {
        $request = $this->message->createRequest('GET', $this->apiEndpoint.$uri);

        return $this->adapter->sendRequest($request);
    }
}
