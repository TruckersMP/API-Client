<?php

namespace TruckersMP\APIClient;

use TruckersMP\APIClient\Requests\BanRequest;
use TruckersMP\APIClient\Requests\CompanyIndexRequest;
use TruckersMP\APIClient\Requests\CompanyRequest;
use TruckersMP\APIClient\Requests\GameTimeRequest;
use TruckersMP\APIClient\Requests\PlayerRequest;
use TruckersMP\APIClient\Requests\RuleRequest;
use TruckersMP\APIClient\Requests\ServerRequest;
use TruckersMP\APIClient\Requests\VersionRequest;

class Client
{
    /**
     * The configuration to use for Guzzle.
     *
     * @var array
     */
    protected static $config = [];

    /**
     * Create a new Client instance.
     *
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        self::$config = $config;
    }

    /**
     * Get the information for the player with the specified ID.
     *
     * https://stats.truckersmp.com/api#players_lookup
     *
     * @param int $id
     *
     * @return \TruckersMP\APIClient\Requests\PlayerRequest
     */
    public function player(int $id): PlayerRequest
    {
        return new PlayerRequest($id);
    }

    /**
     * Get the bans for the player with the specified ID.
     *
     * https://stats.truckersmp.com/api#ban_lookup
     *
     * @param int $id
     *
     * @return \TruckersMP\APIClient\Requests\BanRequest
     */
    public function bans(int $id): BanRequest
    {
        return new BanRequest($id);
    }

    /**
     * Get the information about the servers.
     *
     * https://stats.truckersmp.com/api#servers_list
     *
     * @return \TruckersMP\APIClient\Requests\ServerRequest
     */
    public function servers(): ServerRequest
    {
        return new ServerRequest();
    }

    /**
     * Get the current game time.
     *
     * https://stats.truckersmp.com/api#game_time
     *
     * @return \TruckersMP\APIClient\Requests\GameTimeRequest
     */
    public function gameTime(): GameTimeRequest
    {
        return new GameTimeRequest();
    }

    /**
     * Get the recent and featured companies.
     *
     * https://stats.truckersmp.com/api#vtc_index
     *
     * @return \TruckersMP\APIClient\Requests\CompanyIndexRequest
     */
    public function companies(): CompanyIndexRequest
    {
        return new CompanyIndexRequest();
    }

    /**
     * Get the information for the company with the specified ID.
     *
     * https://stats.truckersmp.com/api#vtc_info
     *
     * @param int $id
     *
     * @return \TruckersMP\APIClient\Requests\CompanyRequest
     */
    public function company(int $id): CompanyRequest
    {
        return new CompanyRequest($id);
    }

    /**
     * Get the TruckersMP version for ETS2 and ATS.
     *
     * https://stats.truckersmp.com/api#truckersmp_version
     *
     * @return \TruckersMP\APIClient\Requests\VersionRequest
     */
    public function version(): VersionRequest
    {
        return new VersionRequest();
    }

    /**
     * Get the current in-game rules.
     *
     * https://stats.truckersmp.com/api#truckersmp_rules
     *
     * @return \TruckersMP\APIClient\Requests\RuleRequest
     */
    public function rules(): RuleRequest
    {
        return new RuleRequest();
    }

    /**
     * Get the configuration to use for Guzzle.
     *
     * @return array
     */
    public static function config()
    {
        return self::$config;
    }
}
