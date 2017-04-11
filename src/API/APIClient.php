<?php

/*
* TruckersMP REST API Library
* Website: truckersmp.com
*/

namespace TruckersMP\API;

use phpFastCache\CacheManager;
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
     * @var \phpFastCache\Cache\ExtendedCacheItemPoolInterface|bool
     */
    private $cache;

    /**
     * APIClient constructor.
     *
     * @param string|bool $cache
     * @param array       $config
     * @param string      $apiEndpoint
     * @param string      $version
     * @param bool        $secure
     *
     * @throws \phpFastCache\Exceptions\phpFastCacheDriverCheckException
     */

    public function __construct($cache = false, $config = [], $apiEndpoint = 'api.truckersmp.com', $version = 'v2', $secure = true)
    {
        $scheme = $secure ? 'https' : 'http';
        $url    = $scheme . '://' . $apiEndpoint . '/' . $version . '/';

        $this->request = new Request($url, $config);

        if ($cache !== false) {
            $this->cache = CacheManager::getInstance('files', [
                'path' => $cache,
            ]);
        } else {
            $this->cache = false;
        }
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
        $result = $this->execute('player/' . $id, 10 * 60);

        return new Player($result);
    }

    public function execute($uri, $ttl)
    {
        if ($this->cache !== false) {
            $cached = $this->cache->getItem(urlencode($uri));

            if (is_null($cached->get())) {
                $request = $this->request->execute($uri);
                $cached->set($request)->expiresAfter($ttl);
                $this->cache->save($cached);
            }

            return $cached->get();
        }

        return $this->request->execute($uri);
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
        $result = $this->execute('bans/' . $id, 10 * 60);
        var_dump($result);

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
        $result = $this->execute('servers', 1 * 60);

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
        $result = $this->execute('game_time', 1 * 60);

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
        $result = $this->execute('version', 60 * 60);

        return new Version($result);
    }

    public function clearCache()
    {
        if ($this->cache !== false) {
            $this->cache->clear();

            return true;
        }

        return false;
    }
}
