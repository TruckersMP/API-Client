<?php

namespace Tests;

use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;
use PHPUnit\Framework\TestCase as BaseTestCase;
use TruckersMP\Client;
use TruckersMP\Collections\PostsCollection;
use TruckersMP\Collections\ServerCollection;
use TruckersMP\Models\Company;
use TruckersMP\Models\GameTime;
use TruckersMP\Models\Player;
use TruckersMP\Models\Rule;
use TruckersMP\Models\Version;

class TestCase extends BaseTestCase
{
    /**
     * The number of seconds we should cache the data for.
     */
    private const CACHE_SECONDS = 3600;

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
     *
     * @throws \Phpfastcache\Exceptions\PhpfastcacheDriverCheckException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheDriverException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheDriverNotFoundException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidConfigurationException
     * @throws \ReflectionException
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
     * Get or cache the given player.
     *
     * @param int $id
     *
     * @return \TruckersMP\Models\Player
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function player(int $id): Player
    {
        $cachedPlayer = $this->cache->getItem('player_' . $id);

        if (! $cachedPlayer->isHit()) {
            $cachedPlayer->set($this->client->player($id)->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedPlayer);
        }

        return $cachedPlayer->get();
    }

    /**
     * Get or cache the bans for the player.
     *
     * @param int $id
     *
     * @return \TruckersMP\Models\Ban[]
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \Http\Client\Exception
     */
    public function bans(int $id): array
    {
        $cachedBans = $this->cache->getItem('bans_' . $id);

        if (! $cachedBans->isHit()) {
            $cachedBans->set($this->client->bans($id)->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedBans);
        }

        return $cachedBans->get();
    }

    /**
     * Get or cache the server request.
     *
     * @return \TruckersMP\Collections\ServerCollection|\TruckersMP\Models\Server[]
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function servers(): ServerCollection
    {
        $cachedServers = $this->cache->getItem('servers');

        if (! $cachedServers->isHit()) {
            $cachedServers->set($this->client->servers()->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedServers);
        }

        return $cachedServers->get();
    }

    /**
     * Get or cache the game time.
     *
     * @return \TruckersMP\Models\GameTime
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function gameTime(): GameTime
    {
        $cachedGameTime = $this->cache->getItem('game_time');

        if (! $cachedGameTime->isHit()) {
            $cachedGameTime->set($this->client->gameTime()->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedGameTime);
        }

        return $cachedGameTime->get();
    }

    /**
     * Get or cache the company with the specified id.
     *
     * @param int $id
     *
     * @return \TruckersMP\Models\Company
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \Http\Client\Exception
     */
    public function company(int $id): Company
    {
        $cachedCompany = $this->cache->getItem('company_' . $id);

        if (! $cachedCompany->isHit()) {
            $cachedCompany->set($this->client->company($id)->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedCompany);
        }

        return $cachedCompany->get();
    }

    /**
     * Get the news posts for the specified company.
     *
     * @param int $id
     *
     * @return PostsCollection|\TruckersMP\Models\CompanyPost[]
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function companyNews(int $id): PostsCollection
    {
        $cachedNews = $this->cache->getItem('company_news_' . $id);

        if (! $cachedNews->isHit()) {
            $cachedNews->set($this->client->company($id)->posts()->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedNews);
        }

        return $cachedNews->get();
    }

    /**
     * Get or cache the TruckersMP version.
     *
     * @return \TruckersMP\Models\Version
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function version(): Version
    {
        $cachedVersion = $this->cache->getItem('version');

        if (! $cachedVersion->isHit()) {
            $cachedVersion->set($this->client->version()->get())->expiresAfter(self::CACHE_SECONDS);
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
     */
    public function rules(): Rule
    {
        $cachedRules = $this->cache->getItem('rules');

        if (! $cachedRules->isHit()) {
            $cachedRules->set($this->client->rules()->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedRules);
        }

        return $cachedRules->get();
    }
}
