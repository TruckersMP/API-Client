<?php

/**
 * TruckersMP REST API Library
 * Website: truckersmp.com
 */

namespace TruckersMP;

use TruckersMP\Collections\BanCollection;
use TruckersMP\Collections\CompanyCollection;
use TruckersMP\Collections\ServerCollection;
use TruckersMP\Helpers\Request;
use TruckersMP\Models\Company;
use TruckersMP\Models\GameTime;
use TruckersMP\Models\Player;
use TruckersMP\Models\Rule;
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
     * @return Player
     */
    public function player(int $id): Player
    {
        return new Player(
            $this->request->execute(__FUNCTION__ . '/' . $id)
        );
    }

    /**
     * Get bans information by player ID.
     *
     * https://stats.truckersmp.com/api#ban_lookup
     *
     * @param int $id
     *
     * @return BanCollection
     *@throws \Http\Client\Exception
     * @throws \Exception
     */
    public function bans(int $id): BanCollection
    {
        return new BanCollection(
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
     * @return ServerCollection
     */
    public function servers(): ServerCollection
    {
        return new ServerCollection(
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

    public function companies(): CompanyCollection
    {
        return new CompanyCollection(
            $this->request->execute('vtc')
        );
    }

    /**
     * Get the company information for the company with the specified ID.
     *
     * https://stats.truckersmp.com/api#vtc_info
     *
     * @param int $id
     * @return \TruckersMP\Models\Company
     * @throws \Http\Client\Exception
     */
    public function company(int $id): Company
    {
        return new Company(
            $this->request->execute('vtc/' . $id)
        );
    }

    /**
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
