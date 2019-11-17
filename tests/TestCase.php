<?php

namespace Tests;

use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;
use PHPUnit\Framework\TestCase as BaseTestCase;
use TruckersMP\Client;
use TruckersMP\Collections\BanCollection;
use TruckersMP\Collections\ServerCollection;
use TruckersMP\Models\Company;
use TruckersMP\Models\GameTime;
use TruckersMP\Models\Player;
use TruckersMP\Models\Rule;
use TruckersMP\Models\Version;

class TestCase extends BaseTestCase
{
    /**
     * @var \TruckersMP\Client
     */
    protected $client;

    /**
     * @var \Phpfastcache\Core\Pool\ExtendedCacheItemPoolInterface
     */
    protected $cache;

    /**
     * Create a new TestCase instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();

        CacheManager::setDefaultConfig(new ConfigurationOption([
            'path' => __DIR__ . '/cache',
        ]));

        $this->cache = CacheManager::getInstance();
    }

    /**
     * Get or cache the player.
     *
     * @param  int  $id
     * @return \TruckersMP\Models\Player
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function player(int $id): Player
    {
        $key = 'player_' . $id;

        $cachedPlayer = $this->cache->getItem($key);

        if (! $cachedPlayer->isHit()) {
            $cachedPlayer->set($this->client->player($id))->expiresAfter(60);
            $this->cache->save($cachedPlayer);
        }

        return $cachedPlayer->get();
    }

    /**
     * Get or cache the bans for the player.
     *
     * @param  int  $id
     * @return \TruckersMP\Collections\BanCollection
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function bans(int $id): BanCollection
    {
        $key = 'bans_' . $id;

        $cachedBans = $this->cache->getItem($key);

        if (! $cachedBans->isHit()) {
            $cachedBans->set($this->client->bans($id))->expiresAfter(60);
            $this->cache->save($cachedBans);
        }

        return $cachedBans->get();
    }

    /**
     * Get or cache the servers.
     *
     * @return ServerCollection
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function servers(): ServerCollection
    {
        $cachedServers = $this->cache->getItem('servers');

        if (! $cachedServers->isHit()) {
            $cachedServers->set($this->client->servers())->expiresAfter(60);
            $this->cache->save($cachedServers);
        }

        return $cachedServers->get();
    }

    /**
     * Get or cache the game in time.
     *
     * @return \TruckersMP\Models\GameTime
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function gameTime(): GameTime
    {
        $cachedGameTime = $this->cache->getItem('game_time');

        if (! $cachedGameTime->isHit()) {
            $cachedGameTime->set($this->client->gameTime())->expiresAfter(60);
            $this->cache->save($cachedGameTime);
        }

        return $cachedGameTime->get();
    }

    /**
     * Get or cache the company.
     *
     * @param  int  $id
     * @return \TruckersMP\Models\Company
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function company(int $id): Company
    {
        $key = 'company_' . $id;

        $cachedCompany = $this->cache->getItem($key);

        if (! $cachedCompany->isHit()) {
            $cachedCompany->set($this->client->company($id))->expiresAfter(60);
            $this->cache->save($cachedCompany);
        }

        return $cachedCompany->get();
    }

    /**
     * Get or cache the version.
     *
     * @return \TruckersMP\Models\Version
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function version(): Version
    {
        $cachedVersion = $this->cache->getItem('version');

        if (! $cachedVersion->isHit()) {
            $cachedVersion->set($this->client->version())->expiresAfter(60);
            $this->cache->save($cachedVersion);
        }

        return $cachedVersion->get();
    }

    /**
     * Get or cache the rules.
     *
     * @return \TruckersMP\Models\Rule
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\APIErrorException
     */
    public function rules(): Rule
    {
        $cachedRules = $this->cache->getItem('rules');

        if (! $cachedRules->isHit()) {
            $cachedRules->set($this->client->rules())->expiresAfter(60);
            $this->cache->save($cachedRules);
        }

        return $cachedRules->get();
    }
}
