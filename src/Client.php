<?php

namespace TruckersMP\APIClient;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface;
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
     * The API domain including the scheme.
     *
     * @var string
     */
    protected string $domain = 'https://api.truckersmp.com';

    /**
     * The currently used API version.
     *
     * @var int
     */
    protected int $version = 2;

    /**
     * The instance of an HTTP client.
     *
     * @var ClientInterface
     */
    protected ClientInterface $httpClient;

    /**
     * Create a new Client instance.
     *
     * @param  array  $config
     * @return void
     */
    public function __construct(array $config = [])
    {
        $config = array_merge_recursive($config, [
            'base_uri' => $this->domain . '/v' . $this->version . '/',
            'headers' => [
                'User-Agent' => 'TruckersMP API Client (https://github.com/TruckersMP/API-Client)',
                'Content-Type' => 'application/json',
            ],
        ]);

        $this->httpClient = new GuzzleClient($config);
    }

    /**
     * Get the configured HTTP client.
     *
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * Set the instance of the HTTP client.
     *
     * @param  ClientInterface  $httpClient
     * @return void
     */
    public function setHttpClient(ClientInterface $httpClient): void
    {
        $this->httpClient = $httpClient;
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
        return new PlayerRequest($this, $id);
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
        return new BanRequest($this, $id);
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
        return new ServerRequest($this);
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
        return new GameTimeRequest($this);
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
        return new CompanyIndexRequest($this);
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
        return new CompanyRequest($this, $key);
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
        return new VersionRequest($this);
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
        return new RuleRequest($this);
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
        return new EventIndexRequest($this);
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
        return new EventRequest($this, $id);
    }
}
