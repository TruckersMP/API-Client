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
use Phpfastcache\Exceptions\PhpfastcacheLogicException;
use PHPUnit\Framework\TestCase as BaseTestCase;
use Psr\Cache\InvalidArgumentException;
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
use TruckersMP\APIClient\Models\CompanyEventIndex;
use TruckersMP\APIClient\Models\CompanyIndex;
use TruckersMP\APIClient\Models\CompanyMember;
use TruckersMP\APIClient\Models\CompanyMemberIndex;
use TruckersMP\APIClient\Models\CompanyPost;
use TruckersMP\APIClient\Models\CompanyRole;
use TruckersMP\APIClient\Models\Event;
use TruckersMP\APIClient\Models\EventIndex;
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
    protected static $cache;

    /**
     * Create a new TestCase instance.
     *
     * @return void
     *
     * @throws PhpfastcacheLogicException
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

        if (!self::$cache) {
            self::$cache = CacheManager::getInstance('Files');
        }
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
     * @throws InvalidArgumentException
     */
    public function player(int $id): Player
    {
        $cachedPlayer = self::$cache->getItem('player_' . $id);

        if (!$cachedPlayer->isHit()) {
            $cachedPlayer->set($this->client->player($id)->get())->expiresAfter(self::CACHE_SECONDS);
            self::$cache->save($cachedPlayer);
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
     * @throws InvalidArgumentException
     */
    public function playerBans(int $id): BanCollection
    {
        $cachedBans = self::$cache->getItem('player_bans_' . $id);

        if (!$cachedBans->isHit()) {
            $cachedBans->set($this->client->player($id)->bans()->get())->expiresAfter(self::CACHE_SECONDS);
            self::$cache->save($cachedBans);
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
     * @throws InvalidArgumentException
     */
    public function bans(int $id): BanCollection
    {
        $cachedBans = self::$cache->getItem('bans_' . $id);

        if (!$cachedBans->isHit()) {
            $cachedBans->set($this->client->bans($id)->get())->expiresAfter(self::CACHE_SECONDS);
            self::$cache->save($cachedBans);
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
     * @throws InvalidArgumentException
     */
    public function servers(): ServerCollection
    {
        $cachedServers = self::$cache->getItem('servers');

        if (!$cachedServers->isHit()) {
            $cachedServers->set($this->client->servers()->get())->expiresAfter(self::CACHE_SECONDS);
            self::$cache->save($cachedServers);
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
     * @throws InvalidArgumentException
     */
    public function gameTime(): GameTime
    {
        $cachedGameTime = self::$cache->getItem('game_time');

        if (!$cachedGameTime->isHit()) {
            $cachedGameTime->set($this->client->gameTime()->get())->expiresAfter(self::CACHE_SECONDS);
            self::$cache->save($cachedGameTime);
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
     * @throws InvalidArgumentException
     */
    public function companies(): CompanyIndex
    {
        $cachedCompanies = self::$cache->getItem('recent_companies');

        if (!$cachedCompanies->isHit()) {
            $cachedCompanies->set($this->client->companies()->get());
            self::$cache->save($cachedCompanies);
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
     * @throws InvalidArgumentException
     */
    public function company(int $id): Company
    {
        $cachedCompany = self::$cache->getItem('company_' . $id);

        if (!$cachedCompany->isHit()) {
            $cachedCompany->set($this->client->company($id)->get())->expiresAfter(self::CACHE_SECONDS);
            self::$cache->save($cachedCompany);
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
     * @throws InvalidArgumentException
     */
    public function companyPosts(int $id): PostCollection
    {
        $cachedNews = self::$cache->getItem('company_posts_' . $id);

        if (!$cachedNews->isHit()) {
            $cachedNews->set($this->client->company($id)->posts()->get())->expiresAfter(self::CACHE_SECONDS);
            self::$cache->save($cachedNews);
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
     * @throws InvalidArgumentException
     */
    public function companyPost(int $companyId, int $postId): CompanyPost
    {
        $cachedPost = self::$cache->getItem('company_' . $companyId . '_post_' . $postId);

        if (!$cachedPost->isHit()) {
            $cachedPost->set(
                $this->client->company($companyId)->post($postId)->get()
            )->expiresAfter(self::CACHE_SECONDS);

            self::$cache->save($cachedPost);
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
     * @throws InvalidArgumentException
     */
    public function companyRoles(int $companyId): RoleCollection
    {
        $cachedRoles = self::$cache->getItem('company_roles_' . $companyId);

        if (!$cachedRoles->isHit()) {
            $cachedRoles->set($this->client->company($companyId)->roles()->get())->expiresAfter(self::CACHE_SECONDS);
            self::$cache->save($cachedRoles);
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
     * @throws InvalidArgumentException
     */
    public function companyRole(int $companyId, int $roleId): CompanyRole
    {
        $cachedRole = self::$cache->getItem('company_' . $companyId . '_roles_' . $roleId);

        if (!$cachedRole->isHit()) {
            $cachedRole->set(
                $this->client->company($companyId)->role($roleId)->get()
            )->expiresAfter(self::CACHE_SECONDS);

            self::$cache->save($cachedRole);
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
     * @throws InvalidArgumentException
     */
    public function companyMembers(int $companyId): CompanyMemberIndex
    {
        $cachedMembers = self::$cache->getItem('company_members_' . $companyId);

        if (!$cachedMembers->isHit()) {
            $cachedMembers->set(
                $this->client->company($companyId)->members()->get()
            );

            self::$cache->save($cachedMembers);
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
     * @throws InvalidArgumentException
     */
    public function companyMember(int $companyId, int $memberId): CompanyMember
    {
        $cachedMember = self::$cache->getItem('company_member_' . $memberId);

        if (!$cachedMember->isHit()) {
            $cachedMember->set(
                $this->client->company($companyId)->member($memberId)->get()
            )->expiresAfter(self::CACHE_SECONDS);

            self::$cache->save($cachedMember);
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
     * @throws InvalidArgumentException
     */
    public function version(): Version
    {
        $cachedVersion = self::$cache->getItem('version');

        if (!$cachedVersion->isHit()) {
            $cachedVersion->set($this->client->version()->get())->expiresAfter(self::CACHE_SECONDS);
            self::$cache->save($cachedVersion);
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
     * @throws InvalidArgumentException
     */
    public function rules(): Rule
    {
        $cachedRules = self::$cache->getItem('rules');

        if (!$cachedRules->isHit()) {
            $cachedRules->set($this->client->rules()->get())->expiresAfter(self::CACHE_SECONDS);
            self::$cache->save($cachedRules);
        }

        return $cachedRules->get();
    }

    /**
     * Get or cache the recent events.
     *
     * @return EventIndex
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws InvalidArgumentException
     */
    public function events(): EventIndex
    {
        $cachedEvents = self::$cache->getItem('recent_events');

        if (!$cachedEvents->isHit()) {
            $cachedEvents->set($this->client->events()->get());
            self::$cache->save($cachedEvents);
        }

        return $cachedEvents->get();
    }

    /**
     * Get or cache the event with the specified id.
     *
     * @param  int  $id
     *
     * @return Event
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws InvalidArgumentException
     */
    public function event(int $id): Event
    {
        $cachedEvent = self::$cache->getItem('event_' . $id);

        if (!$cachedEvent->isHit()) {
            $cachedEvent->set($this->client->event($id)->get())->expiresAfter(self::CACHE_SECONDS);
            self::$cache->save($cachedEvent);
        }

        return $cachedEvent->get();
    }

    /**
     * Get or cache the company events.
     *
     * @param  int  $companyId
     *
     * @return CompanyEventIndex
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws InvalidArgumentException
     */
    public function companyEvents(int $companyId): CompanyEventIndex
    {
        $cachedEvents = self::$cache->getItem('company_events_' . $companyId);

        if (!$cachedEvents->isHit()) {
            $cachedEvents->set(
                $this->client->company($companyId)->events()->get()
            );

            self::$cache->save($cachedEvents);
        }

        return $cachedEvents->get();
    }

    /**
     * Get or cache the company event.
     *
     * @param  int  $companyId
     * @param  int  $eventId
     *
     * @return Event
     *
     * @throws PhpfastcacheInvalidArgumentException
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     * @throws InvalidArgumentException
     */
    public function companyEvent(int $companyId, int $eventId): Event
    {
        $cachedEvent = self::$cache->getItem('company_member_' . $eventId);

        if (!$cachedEvent->isHit()) {
            $cachedEvent->set(
                $this->client->company($companyId)->event($eventId)->get()
            )->expiresAfter(self::CACHE_SECONDS);

            self::$cache->save($cachedEvent);
        }

        return $cachedEvent->get();
    }
}
