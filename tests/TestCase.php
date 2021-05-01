<?php

namespace Tests;

use Phpfastcache\CacheManager;
use Phpfastcache\Config\ConfigurationOption;
use Phpfastcache\Core\Pool\ExtendedCacheItemPoolInterface;
use Phpfastcache\Exceptions\PhpfastcacheDriverCheckException;
use Phpfastcache\Exceptions\PhpfastcacheDriverException;
use Phpfastcache\Exceptions\PhpfastcacheDriverNotFoundException;
use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Phpfastcache\Exceptions\PhpfastcacheInvalidConfigurationException;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Psr\Http\Client\ClientExceptionInterface;
use ReflectionException;
use TruckersMP\APIClient\Client;
use TruckersMP\APIClient\Collections\BanCollection;
use TruckersMP\APIClient\Collections\Company\PostCollection;
use TruckersMP\APIClient\Collections\Company\RoleCollection;
use TruckersMP\APIClient\Collections\ServerCollection;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\Ban;
use TruckersMP\APIClient\Models\Company;
use TruckersMP\APIClient\Models\CompanyIndex;
use TruckersMP\APIClient\Models\CompanyMember;
use TruckersMP\APIClient\Models\CompanyMemberIndex;
use TruckersMP\APIClient\Models\CompanyPost;
use TruckersMP\APIClient\Models\CompanyRole;
use TruckersMP\APIClient\Models\GameTime;
use TruckersMP\APIClient\Models\Player;
use TruckersMP\APIClient\Models\Rule;
use TruckersMP\APIClient\Models\Server;
use TruckersMP\APIClient\Models\Version;

class TestCase extends BaseTestCase
{
    /**
     * The number of seconds we should cache the data for.
     */
    private const CACHE_SECONDS = 600;

    /**
     * The current instance of the Client.
     *
     * @var Client
     */
    protected $client;

    /**
     * The current cache instance.
     *
     * @var ExtendedCacheItemPoolInterface
     */
    protected $cache;

    /**
     * Create a new TestCase instance.
     *
     * @return void
     *
     * @throws PhpfastcacheDriverCheckException
     * @throws PhpfastcacheDriverException
     * @throws PhpfastcacheDriverNotFoundException
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PhpfastcacheInvalidConfigurationException
     * @throws ReflectionException
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
     * @param  int  $id
     *
     * @return Player
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function player(int $id): Player
    {
        $cachedPlayer = $this->cache->getItem('player_' . $id);

        if (!$cachedPlayer->isHit()) {
            $cachedPlayer->set($this->client->player($id)->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedPlayer);
        }

        return $cachedPlayer->get();
    }

    /**
     * Get or cache the players bans.
     *
     * @param  int  $id
     *
     * @return BanCollection|Ban[]
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function playerBans(int $id): BanCollection
    {
        $cachedBans = $this->cache->getItem('player_bans_' . $id);

        if (!$cachedBans->isHit()) {
            $cachedBans->set($this->client->player($id)->bans()->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedBans);
        }

        return $cachedBans->get();
    }

    /**
     * Get or cache the bans for the player.
     *
     * @param  int  $id
     *
     * @return BanCollection
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function bans(int $id): BanCollection
    {
        $cachedBans = $this->cache->getItem('bans_' . $id);

        if (!$cachedBans->isHit()) {
            $cachedBans->set($this->client->bans($id)->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedBans);
        }

        return $cachedBans->get();
    }

    /**
     * Get or cache the server request.
     *
     * @return ServerCollection|Server[]
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function servers(): ServerCollection
    {
        $cachedServers = $this->cache->getItem('servers');

        if (!$cachedServers->isHit()) {
            $cachedServers->set($this->client->servers()->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedServers);
        }

        return $cachedServers->get();
    }

    /**
     * Get or cache the game time.
     *
     * @return GameTime
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function gameTime(): GameTime
    {
        $cachedGameTime = $this->cache->getItem('game_time');

        if (!$cachedGameTime->isHit()) {
            $cachedGameTime->set($this->client->gameTime()->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedGameTime);
        }

        return $cachedGameTime->get();
    }

    /**
     * Get or cache the recent companies.
     *
     * @return CompanyIndex
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function companies(): CompanyIndex
    {
        $cachedCompanies = $this->cache->getItem('recent_companies');

        if (!$cachedCompanies->isHit()) {
            $cachedCompanies->set($this->client->companies()->get());
            $this->cache->save($cachedCompanies);
        }

        return $cachedCompanies->get();
    }

    /**
     * Get or cache the company with the specified id.
     *
     * @param  int  $id
     *
     * @return Company
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function company(int $id): Company
    {
        $cachedCompany = $this->cache->getItem('company_' . $id);

        if (!$cachedCompany->isHit()) {
            $cachedCompany->set($this->client->company($id)->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedCompany);
        }

        return $cachedCompany->get();
    }

    /**
     * Get the news posts for the specified company.
     *
     * @param  int  $id
     *
     * @return PostCollection|CompanyPost[]
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function companyPosts(int $id): PostCollection
    {
        $cachedNews = $this->cache->getItem('company_posts_' . $id);

        if (!$cachedNews->isHit()) {
            $cachedNews->set($this->client->company($id)->posts()->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedNews);
        }

        return $cachedNews->get();
    }

    /**
     * Get or Cache the specified company post.
     *
     * @param  int  $companyId
     * @param  int  $postId
     *
     * @return CompanyPost
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function companyPost(int $companyId, int $postId): CompanyPost
    {
        $cachedPost = $this->cache->getItem('company_' . $companyId . '_post_' . $postId);

        if (!$cachedPost->isHit()) {
            $cachedPost->set(
                $this->client->company($companyId)->post($postId)->get()
            )->expiresAfter(self::CACHE_SECONDS);

            $this->cache->save($cachedPost);
        }

        return $cachedPost->get();
    }

    /**
     * Get or cache the company roles.
     *
     * @param  int  $companyId
     *
     * @return RoleCollection|CompanyRole[]
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function companyRoles(int $companyId): RoleCollection
    {
        $cachedRoles = $this->cache->getItem('company_roles_' . $companyId);

        if (!$cachedRoles->isHit()) {
            $cachedRoles->set($this->client->company($companyId)->roles()->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedRoles);
        }

        return $cachedRoles->get();
    }

    /**
     * Get or cache the company role.
     *
     * @param  int  $companyId
     * @param  int  $roleId
     *
     * @return CompanyRole
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function companyRole(int $companyId, int $roleId): CompanyRole
    {
        $cachedRole = $this->cache->getItem('company_' . $companyId . '_roles_' . $roleId);

        if (!$cachedRole->isHit()) {
            $cachedRole->set(
                $this->client->company($companyId)->role($roleId)->get()
            )->expiresAfter(self::CACHE_SECONDS);

            $this->cache->save($cachedRole);
        }

        return $cachedRole->get();
    }

    /**
     * Get or cache the company members.
     *
     * @param  int  $companyId
     *
     * @return mixed
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function companyMembers(int $companyId): CompanyMemberIndex
    {
        $cachedMembers = $this->cache->getItem('company_members_' . $companyId);

        if (!$cachedMembers->isHit()) {
            $cachedMembers->set(
                $this->client->company($companyId)->members()->get()
            );

            $this->cache->save($cachedMembers);
        }

        return $cachedMembers->get();
    }

    /**
     * Get or cache the company member.
     *
     * @param  int  $companyId
     * @param  int  $memberId
     *
     * @return CompanyMember
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function companyMember(int $companyId, int $memberId): CompanyMember
    {
        $cachedMember = $this->cache->getItem('company_member_' . $memberId);

        if (!$cachedMember->isHit()) {
            $cachedMember->set(
                $this->client->company($companyId)->member($memberId)->get()
            )->expiresAfter(self::CACHE_SECONDS);

            $this->cache->save($cachedMember);
        }

        return $cachedMember->get();
    }

    /**
     * Get or cache the TruckersMP version.
     *
     * @return Version
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function version(): Version
    {
        $cachedVersion = $this->cache->getItem('version');

        if (!$cachedVersion->isHit()) {
            $cachedVersion->set($this->client->version()->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedVersion);
        }

        return $cachedVersion->get();
    }

    /**
     * Get or cache the rules.
     *
     * @return Rule
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function rules(): Rule
    {
        $cachedRules = $this->cache->getItem('rules');

        if (!$cachedRules->isHit()) {
            $cachedRules->set($this->client->rules()->get())->expiresAfter(self::CACHE_SECONDS);
            $this->cache->save($cachedRules);
        }

        return $cachedRules->get();
    }
}
