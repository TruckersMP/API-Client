<?php

/**
 * TruckersMP REST API Library
 * Website: truckersmp.com
 */

namespace TruckersMP\Helpers;

use TruckersMP\Models\BansModel;
use TruckersMP\Models\GameTimeModel;
use TruckersMP\Models\PlayerModel;
use TruckersMP\Models\ServersModel;
use TruckersMP\Models\VersionModel;

class Client
{
    const API_ENDPOINT = 'api.truckersmp.com';
    const API_VERSION = 'v2';

    /**
     * @var \TruckersMP\Helpers\RequestHelper
     */
    protected $request;

    /**
     * Client constructor.
     *
     * @param array $config
     * @param bool $secure
     */
    public function __construct(array $config = [], bool $secure = true)
    {
        $scheme = $secure ? 'https' : 'http';
        $url = $scheme . '://' . self::API_ENDPOINT . '/' . self::API_VERSION . '/';

        $this->request = new RequestHelper($url, $config);
    }

    /**
     * Get player information by ID.
     *
     * @param int $id
     * @throws \Exception
     * @throws \Http\Client\Exception
     * @return \TruckersMP\Models\PlayerModel
     */
    public function player(int $id): PlayerModel
    {
        $result = $this->request->execute('player/' . $id);

        return new PlayerModel($result);
    }

    /**
     * Get bans information by player ID.
     *
     * @param int $id
     * @throws \Exception
     * @throws \Http\Client\Exception
     * @return \TruckersMP\Models\BansModel
     */
    public function bans(int $id): BansModel
    {
        $result = $this->request->execute('bans/' . $id);

        return new BansModel($result);
    }

    /**
     * Get server information.
     *
     * @throws \Exception
     * @throws \Http\Client\Exception
     * @return \TruckersMP\Models\ServersModel
     */
    public function servers(): ServersModel
    {
        $result = $this->request->execute('servers');

        return new ServersModel($result);
    }

    /**
     * Get the current game time
     *
     * @throws \Exception
     * @throws \Http\Client\Exception
     * @return \TruckersMP\Models\GameTimeModel
     */
    public function gameTime(): GameTimeModel
    {
        $result = $this->request->execute('game_time');

        return new GameTimeModel($result);
    }

    /**
     * @throws \Exception
     * @throws \Http\Client\Exception
     * @return \TruckersMP\Models\VersionModel
     */
    public function version(): VersionModel
    {
        $result = $this->request->execute('version');

        return new VersionModel($result);
    }
}
