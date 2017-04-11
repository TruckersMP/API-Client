<?php

/*
* TruckersMP REST API Library
* Website: truckersmp.com
*/

namespace TruckersMP\API;

use TruckersMP\Types\Bans;
use TruckersMP\Types\GameTime;
use TruckersMP\Types\Player;
use TruckersMP\Types\Servers;
use TruckersMP\Types\Version;

class APIClient
{
    /**
     * @var \TruckersMP\API\Request
     */
    private $request;

    /**
     * APIClient constructor.
     *
     * @param array  $config
     * @param string $apiEndpoint
     * @param string $version
     * @param bool   $secure
     */
    public function __construct(
        $config = [],
        $apiEndpoint = 'api.truckersmp.com',
        $version = 'v2',
        $secure = true
    )
    {
        $scheme = $secure ? 'https' : 'http';
        $url    = $scheme . '://' . $apiEndpoint . '/' . $version . '/';

        $this->request = new Request($url, $config);
    }

    /**
     * Fetch player information
     *
     * @param integer $id
     *
     * @return \TruckersMP\Types\Player
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function player($id)
    {
        $result = $this->request->execute('player/' . $id);

        return new Player($result);
    }

    /**
     * @param $id
     *
     * @return \TruckersMP\Types\Bans
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function bans($id)
    {
        $result = $this->request->execute('bans/' . $id);

        return new Bans($result);
    }

    /**
     * @return \TruckersMP\Types\Servers
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function servers()
    {
        $result = $this->request->execute('servers');

        return new Servers($result);
    }

    /**
     * @return \TruckersMP\Types\GameTime
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function gameTime()
    {
        $result = $this->request->execute('game_time');

        return new GameTime($result);
    }

    /**
     * @return \TruckersMP\Types\Version
     * @throws \Exception
     * @throws \Http\Client\Exception
     */
    public function version()
    {
        $result = $this->request->execute('version');

        return new Version($result);
    }
}
