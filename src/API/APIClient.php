<?php

/*
* TruckersMP REST API Library
* Website: truckersmp.com
*/

namespace TruckersMP\API;

use Http\Client\HttpClient;
use Http\Message\MessageFactory\GuzzleMessageFactory;
use TruckersMP\Types\Bans;
use TruckersMP\Types\Player;
use TruckersMP\Types\Servers;
use TruckersMP\Types\Version;
use TruckersMP\Types\GameTime;

class APIClient
{
    /**
     * Base URL for communicating with TruckersMP API
     * @var string
     */
    private $apiEndpoint;

    /**
     * API Version to interface with
     * @var string
     */
    private $version;

    /**
     * HttpClient adapter
     * @var HttpClient
     */
    private $adapter;

    /**
     * Prefixed URL for requests
     * @var string
     */
    private $url;

    /**
     * APIClient constructor.
     * @param HttpClient $adapter
     * @param string $apiEndpoint
     * @param string $version
     * @param bool $secure
     */
    public function __construct(
        HttpClient $adapter,
        $apiEndpoint = 'api.truckersmp.com',
        $version = 'v2',
        $secure = true
    ) {
        $this->apiEndpoint = $apiEndpoint;
        $this->version = $version;

        $scheme = $secure ? 'https' : 'http';

        $this->url = $scheme . '://' . $this->apiEndpoint . '/' . $this->version . '/';

        $this->adapter = $adapter;

    }

    /**
     * Fetch player information
     * @param integer $id
     * @return Player
     */
    public function player($id)
    {
        $message = new GuzzleMessageFactory();

        $request = $message->createRequest('GET', $this->url . 'player/' . $id);

        $result = $this->adapter->sendRequest($request);

        return new Player($result);
    }

    public function bans($id)
    {
        $message = new GuzzleMessageFactory();

        $request = $message->createRequest('GET', $this->url . 'bans/' . $id);

        $result = $this->adapter->sendRequest($request);
        return new Bans($result);
    }

    public function servers()
    {
        $message = new GuzzleMessageFactory();

        $request = $message->createRequest('GET', $this->url . 'servers');

        $result = $this->adapter->sendRequest($request);
        return new Servers($result);
    }

    public function gameTime()
    {
        $message = new GuzzleMessageFactory();

        $request = $message->createRequest('GET', $this->url . 'game_time');

        $result = $this->adapter->sendRequest($request);

        return new GameTime($result);
    }

    public function version()
    {
        $message = new GuzzleMessageFactory();

        $request = $message->createRequest('GET', $this->url . 'version');

        $result = $this->adapter->sendRequest($request);
        return new Version($result);
    }
}
