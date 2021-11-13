<?php

namespace TruckersMP\APIClient;

use TruckersMP\APIClient\Requests\BanRequest;
use TruckersMP\APIClient\Requests\EventIndexRequest;
use TruckersMP\APIClient\Requests\EventRequest;
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
     * @param  array  $config
     * @return void
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
     * @param  int  $id
     * @return PlayerRequest
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
     * @param  int  $id
     * @return BanRequest
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
     * @return ServerRequest
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
     * @return GameTimeRequest
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
     * @return CompanyIndexRequest
     */
    public function companies(): CompanyIndexRequest
    {
        return new CompanyIndexRequest();
    }

    /**
     * Get the information for the company with the specified ID or slug.
     *
     * https://stats.truckersmp.com/api#vtc_info
     *
     * @param  string|int  $key
     * @return CompanyRequest
     */
    public function company(string $key): CompanyRequest
    {
        return new CompanyRequest($key);
    }

    /**
     * Get the TruckersMP version for ETS2 and ATS.
     *
     * https://stats.truckersmp.com/api#truckersmp_version
     *
     * @return VersionRequest
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
     * @return RuleRequest
     */
    public function rules(): RuleRequest
    {
        return new RuleRequest();
    }

    /**
     * Get the featured, today's and upcoming events.
     *
     * https://stats.truckersmp.com/api#events_index
     *
     * @return EventIndexRequest
     */
    public function events(): EventIndexRequest
    {
        return new EventIndexRequest();
    }

    /**
     * Get the information for the event with the specified ID.
     *
     * https://stats.truckersmp.com/api#events_info
     *
     * @param  int  $id
     * @return EventRequest
     */
    public function event(int $id): EventRequest
    {
        return new EventRequest($id);
    }

    /**
     * Get the configuration to use for Guzzle.
     *
     * @return array
     */
    public static function config(): array
    {
        return self::$config;
    }
}
