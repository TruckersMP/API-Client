<?php

namespace TruckersMP;

use TruckersMP\Collections\CompanyCollection;
use TruckersMP\Requests\BanRequest;
use TruckersMP\Requests\CompaniesRequest;
use TruckersMP\Requests\CompanyRequest;
use TruckersMP\Requests\GameTimeRequest;
use TruckersMP\Requests\PlayerRequest;
use TruckersMP\Requests\RuleRequest;
use TruckersMP\Requests\ServerRequest;
use TruckersMP\Requests\VersionRequest;

class Client
{
    /**
     * The configuration to use for Guzzle.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Create a new Client instance.
     *
     * @param  array  $config
     */
    public function __construct(array $config = [])
    {
        $this->config = $config;
    }

    /**
     * Get the information for the player with the specified ID.
     *
     * https://stats.truckersmp.com/api#players_lookup
     *
     * @param int $id
     * @return \TruckersMP\Requests\PlayerRequest
     */
    public function player(int $id): PlayerRequest
    {
        return new PlayerRequest($this->config, $id);
    }

    /**
     * Get the bans for the player with the specified ID.
     *
     * https://stats.truckersmp.com/api#ban_lookup
     *
     * @param int $id
     *
     * @return \TruckersMP\Requests\BanRequest
     */
    public function bans(int $id): BanRequest
    {
        return new BanRequest($this->config, $id);
    }

    /**
     * Get the information about the servers.
     *
     * https://stats.truckersmp.com/api#servers_list
     *
     * @return \TruckersMP\Requests\ServerRequest
     */
    public function servers(): ServerRequest
    {
        return new ServerRequest($this->config);
    }

    /**
     * Get the current game time.
     *
     * https://stats.truckersmp.com/api#game_time
     *
     * @return \TruckersMP\Requests\GameTimeRequest
     */
    public function gameTime(): GameTimeRequest
    {
        return new GameTimeRequest($this->config);
    }

    /**
     * Get the recent and featured companies.
     *
     * https://stats.truckersmp.com/api#vtc_index
     *
     * @return \TruckersMP\Requests\CompaniesRequest
     */
    public function companies(): CompaniesRequest
    {
        return new CompaniesRequest($this->config);
    }

    /**
     * Get the information for the company with the specified ID.
     *
     * https://stats.truckersmp.com/api#vtc_info
     *
     * @param int $id
     *
     * @return \TruckersMP\Requests\CompanyRequest
     */
    public function company(int $id): CompanyRequest
    {
        return new CompanyRequest($this->config, $id);
    }

    /**
     * Get the TruckersMP version for ETS2 and ATS.
     *
     * https://stats.truckersmp.com/api#truckersmp_version
     *
     * @return \TruckersMP\Requests\VersionRequest
     */
    public function version(): VersionRequest
    {
        return new VersionRequest($this->config);
    }

    /**
     * Get the current in-game rules.
     *
     * https://stats.truckersmp.com/api#truckersmp_rules
     *
     * @return \TruckersMP\Requests\RuleRequest
     */
    public function rules(): RuleRequest
    {
        return new RuleRequest($this->config);
    }
}
