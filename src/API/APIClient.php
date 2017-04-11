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
    ) {
        $scheme = $secure ? 'https' : 'http';
        $url = $scheme.'://'.$apiEndpoint.'/'.$version.'/';

        $this->request = new Request($url, $config);
    }

    /**
     * Fetch player information.
     *
     * @param int $id
     *
     * @throws \Exception
     * @throws \Http\Client\Exception
     *
     * @return \TruckersMP\Types\Player
     */
    public function player($id)
    {
        $result = $this->request->execute('player/'.$id);

        return new Player($result);
    }

    /**
     * @param $id
     *
     * @throws \Exception
     * @throws \Http\Client\Exception
     *
     * @return \TruckersMP\Types\Bans
     */
    public function bans($id)
    {
        $result = $this->request->execute('bans/'.$id);

        return new Bans($result);
    }

    /**
     * @throws \Exception
     * @throws \Http\Client\Exception
     *
     * @return \TruckersMP\Types\Servers
     */
    public function servers()
    {
        $result = $this->request->execute('servers');

        return new Servers($result);
    }

    /**
     * @throws \Exception
     * @throws \Http\Client\Exception
     *
     * @return \TruckersMP\Types\GameTime
     */
    public function gameTime()
    {
        $result = $this->request->execute('game_time');

        return new GameTime($result);
    }

    /**
     * @throws \Exception
     * @throws \Http\Client\Exception
     *
     * @return \TruckersMP\Types\Version
     */
    public function version()
    {
        $result = $this->request->execute('version');

        return new Version($result);
    }
}
