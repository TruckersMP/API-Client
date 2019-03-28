<?php

/**
 * TruckersMP REST API Library
 * Website: truckersmp.com
 */

namespace TruckersMP;

use TruckersMP\Helpers\RequestHelper;
use TruckersMP\Models\BansModel;
use TruckersMP\Models\GameTimeModel;
use TruckersMP\Models\PlayerModel;
use TruckersMP\Models\RulesModel;
use TruckersMP\Models\ServersModel;
use TruckersMP\Models\VersionModel;

class Client
{
    const API_ENDPOINT = 'api.truckersmp.com';
    const API_VERSION = 'v2';

    /**
     * @var RequestHelper
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
     * https://stats.truckersmp.com/api#players_lookup
     *
     * @param int $id
     * @throws \Exception
     * @throws \Http\Client\Exception
     * @return PlayerModel
     */
    public function player(int $id): PlayerModel
    {
        return new PlayerModel(
            $this->request->execute(__FUNCTION__ . '/' . $id)
        );
    }

    /**
     * Get bans information by player ID.
     *
     * https://stats.truckersmp.com/api#ban_lookup
     *
     * @param int $id
     * @throws \Exception
     * @throws \Http\Client\Exception
     * @return BansModel
     */
    public function bans(int $id): BansModel
    {
        return new BansModel(
            $this->request->execute(__FUNCTION__ . '/' . $id)
        );
    }

    /**
     * Get server information.
     *
     * https://stats.truckersmp.com/api#servers_list
     *
     * @throws \Exception
     * @throws \Http\Client\Exception
     * @return ServersModel
     */
    public function servers(): ServersModel
    {
        return new ServersModel(
            $this->request->execute(__FUNCTION__)
        );
    }

    /**
     * Get the current game time
     *
     * https://stats.truckersmp.com/api#game_time
     *
     * @throws \Exception
     * @throws \Http\Client\Exception
     * @return GameTimeModel
     */
    public function gameTime(): GameTimeModel
    {
        return new GameTimeModel(
            $this->request->execute(strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', __FUNCTION__)))
        );
    }

    /**
     * @deprecated
     *
     * Information about the current TruckersMP version for ETS2 and ATS
     *
     * https://stats.truckersmp.com/api#truckersmp_version
     *
     * @throws \Exception
     * @throws \Http\Client\Exception
     * @return VersionModel
     */
    public function version(): VersionModel
    {
        return new VersionModel(
            $this->request->execute(__FUNCTION__)
        );
    }

    /**
     * Get the current in-game rules.
     *
     * https://stats.truckersmp.com/api#truckersmp_rules
     *
     * @throws \Http\Client\Exception
     * @throws Exceptions\APIErrorException
     * @return RulesModel
     */
    public function rules(): RulesModel
    {
        return new RulesModel(
            $this->request->execute(__FUNCTION__)
        );
    }
}
