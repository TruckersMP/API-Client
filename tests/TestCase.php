<?php

namespace Tests;

use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;
use PHPUnit\Framework\TestCase as BaseTestCase;
use TruckersMP\Client;

class TestCase extends BaseTestCase
{
    /**
     * @var \TruckersMP\Client
     */
    protected $client;

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
    public function player(int $id)
    {
        $key = 'player_' . $id;

        $cachedPlayer = $this->cache->getItem($key);

        if (! $cachedPlayer->isHit()) {
            $cachedPlayer->set($this->client->player($id))->expiresAfter(600);
            $this->cache->save($cachedPlayer);
        }

        return $cachedPlayer->get();
    }
}
