<?php

/**
 * TruckersMP REST API Library
 * Website: truckersmp.com
 */

namespace TruckersMP;

use TruckersMP\Collections\BansCollection;
use TruckersMP\Helpers\Request;
use TruckersMP\Models\GameTime;
use TruckersMP\Models\PlayerModel;
use TruckersMP\Models\Rule;
use TruckersMP\Models\ServersModel;
use TruckersMP\Models\Version;

class Client
{
    const API_ENDPOINT = 'api.truckersmp.com';
    const API_VERSION = 'v2';

    /**
     * @var Request
     */
    protected $request;

    /**
     * Client constructor.
     *
     * @param array $config
     * @param bool $secure
     */
    public function __construct(array $config = [])
    {
        $url = 'https://' . self::API_ENDPOINT . '/' . self::API_VERSION . '/';

        $this->request = new Request($url, $config);
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
     * @return BansCollection
     */
    public function bans(int $id): BansCollection
    {
        return new BansCollection(
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
     * @return GameTime
     */
    public function gameTime(): GameTime
    {
        return new GameTime(
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
     * @return Version
     */
    public function version(): Version
    {
        return new Version(
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
     * @return Rule
     */
    public function rules(): Rule
    {
        return new Rule(
            $this->request->execute(__FUNCTION__)
        );
    }
}
