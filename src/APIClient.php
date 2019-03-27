<?php

/**
 * TruckersMP REST API Library
 * Website: truckersmp.com
 */

namespace TruckersMP\Helpers;

use TruckersMP\Models\Bans;
use TruckersMP\Models\GameTime;
use TruckersMP\Models\Player;
use TruckersMP\Models\Servers;
use TruckersMP\Models\Version;

class APIClient
{
    const API_ENDPOINT = 'api.truckersmp.com';
    const API_VERSION = 'v2';

    /**
     * @var \TruckersMP\Helpers\Request
     */
    protected $request;

    /**
     * APIClient constructor.
     *
     * @param array $config
     * @param bool $secure
     */
    public function __construct(array $config = [], bool $secure = true)
    {
        $scheme = $secure ? 'https' : 'http';
        $url    = $scheme . '://' . self::API_ENDPOINT . '/' . self::API_VERSION . '/';

        $this->request = new Request($url, $config);
    }

    /**
     * Get player information by ID.
     *
     * @param int $id
     * @throws \Exception
     * @return \TruckersMP\Models\Player
     */
    public function player(int $id): Player
    {
        $result = $this->request->execute('player/' . $id);

        return new Player($result);
    }

    /**
     * Get bans information by player ID.
     *
     * @param int $id
     * @throws \Exception
     * @return \TruckersMP\Models\Bans
     */
    public function bans(int $id): Bans
    {
        $result = $this->request->execute('bans/' . $id);

        return new Bans($result);
    }

    /**
     * Get server information.
     *
     * @throws \Exception
     * @return \TruckersMP\Models\Servers
     */
    public function servers(): Servers
    {
        $result = $this->request->execute('servers');

        return new Servers($result);
    }

    /**
     * Get the current game time
     *
     * @throws \Exception
     * @return \TruckersMP\Models\GameTime
     */
    public function gameTime(): GameTime
    {
        $result = $this->request->execute('game_time');

        return new GameTime($result);
    }

    /**
     * @throws \Exception
     * @return \TruckersMP\Models\Version
     */
    public function version(): Version
    {
        $result = $this->request->execute('version');

        return new Version($result);
    }
}
