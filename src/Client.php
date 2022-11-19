<?php

namespace TruckersMP\APIClient;

use TruckersMP\APIClient\Requests\BanRequest;
use TruckersMP\APIClient\Requests\CompanyIndexRequest;
use TruckersMP\APIClient\Requests\CompanyRequest;
use TruckersMP\APIClient\Requests\EventIndexRequest;
use TruckersMP\APIClient\Requests\EventRequest;
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
     * https://truckersmp.com/developers/api#operation/get-player-id
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
     * https://truckersmp.com/developers/api#operation/get-bans-id
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
     * https://truckersmp.com/developers/api#operation/get-servers
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
     * https://truckersmp.com/developers/api#operation/get-game_time
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
     * https://truckersmp.com/developers/api#operation/get-vtc
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
     * https://truckersmp.com/developers/api#operation/get-vtc-id
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
     * https://truckersmp.com/developers/api#operation/get-version
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
     * https://truckersmp.com/developers/api#operation/get-rules
     *
     * @return RuleRequest
     */
    public function rules(): RuleRequest
    {
        return new RuleRequest();
    }

    /**
     * Get the featured, current, and upcoming events.
     *
     * https://truckersmp.com/developers/api#operation/get-v2-events
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
     * https://truckersmp.com/developers/api#operation/get-events-id
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
