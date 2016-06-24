<?php

/*
* TruckersMP REST API Library
* Website: truckersmp.com
*/

namespace TruckersMP\API;

use GuzzleHttp\Client;
use phpDocumentor\Reflection\DocBlock\Serializer;
use TruckersMP\Types\Bans;
use TruckersMP\Types\Player;
use TruckersMP\Types\Servers;

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
     * GuzzleHTTP Instance
     * @var Client
     */
    private $guzzle;

    /**
     * APIClient constructor.
     * @param string $apiEndpoint
     * @param string $version
     * @param bool $secure
     */
    public function __construct($apiEndpoint = 'api.truckersmp.com', $version = 'v2', $secure = true)
    {
        $this->apiEndpoint = $apiEndpoint;
        $this->version = $version;

        $scheme = $secure ? 'https' : 'http';

        $this->guzzle = new Client([
            'base_uri' => $scheme . '://' . $this->apiEndpoint . '/' . $this->version . '/'
        ]);

    }

    /**
     * Fetch player information
     * @param integer $id
     * @return Player
     */
    public function player($id)
    {
        $result = $this->guzzle->get('player/'.$id);

        return new Player($result);
    }

    public function bans($id)
    {
        $result = $this->guzzle->get('bans/' . $id);
        return new Bans($result);
    }

    public function servers()
    {
        $result = $this->guzzle->get('servers');
        return new Servers($result);
    }

    public function gameTime()
    {
        $load = $this->load("/v2/game_time/");
        if ($load['error'] == false) {
            $load['minutes'] = $load['game_time'];

            $load['hours'] = $load['minutes'] / 60;
            $load['minutes'] = $load['minutes'] % 60;

            $load['days'] = $load['hours'] / 24;
            $load['hours'] = $load['hours'] % 24;

            $load['months'] = $load['days'] / 30;
            $load['days'] = $load['days'] % 30;

            $load['years'] = intval($load['months'] / 12);
            $load['months'] = $load['months'] % 12;
        }
        return $load;
    }

    public function version()
    {
        $load = $this->load("/v2/version/");
        return $load;
    }
}
