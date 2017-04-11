<?php

/*
* TruckersMP REST API Library
* Website: truckersmp.com
*/

namespace TruckersMP\API;

use Desarrolla2\Cache\Cache;
use TruckersMP\Types\Bans;
use TruckersMP\Types\GameTime;
use TruckersMP\Types\Player;
use TruckersMP\Types\Servers;
use TruckersMP\Types\Version;

class APIClient
{
    const API_ENDPOINT = 'api.truckersmp.com';
    const API_VERSION = 'v2';
    /**
     * @var \TruckersMP\API\Request
     */
    private $request;

    /**
     * @var \TruckersMP\API\FileCache|bool
     */
    private $cache;

    /**
     * APIClient constructor.
     *
     * @param array       $config
     * @param bool        $secure
     */

    public function __construct($config = [], $secure = true)
    {
        $scheme = $secure ? 'https' : 'http';
        $url    = $scheme . '://' . self::API_ENDPOINT . '/' . self::API_VERSION . '/';

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
        $result = $this->request->execute('player/' . $id, 10 * 60);

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
        $result = $this->request->execute('bans/' . $id, 10 * 60);

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
        $result = $this->request->execute('servers', 1 * 60);

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
        $result = $this->request->execute('game_time', 1 * 60);

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
        $result = $this->request->execute('version', 60 * 60);

        return new Version($result);
    }

    public function clearCache()
    {
        if ($this->cache !== false) {
            $this->cache->dropCache();

            return true;
        }

        return false;
    }
}
