<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Client;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Requests\BanRequest;
use TruckersMP\APIClient\Requests\Company\MemberRequest;
use TruckersMP\APIClient\Requests\Company\RoleRequest;
use TruckersMP\APIClient\Requests\CompanyRequest;
use TruckersMP\APIClient\Requests\EventUserRequest;

class Player extends Model
{
    /**
     * The ID of the user requested.
     *
     * @var int
     */
    protected int $id;

    /**
     * The name of the user.
     *
     * @var string
     */
    protected string $name;

    /**
     * URL to the avatar used on the website.
     *
     * @var string
     */
    protected string $avatar;

    /**
     * URL to the small avatar on the website.
     *
     * @var string
     */
    protected string $smallAvatar;

    /**
     * The date and time the user registered (UTC).
     *
     * @var Carbon
     */
    protected Carbon $joinDate;

    /**
     * The SteamID64 of the user.
     *
     * @var string
     */
    protected string $steamID64;

    /**
     * The ID of the group the user belongs to.
     *
     * @var int
     */
    protected int $groupId;

    /**
     * The name of the group the user belongs to.
     *
     * @var string
     */
    protected string $groupName;

    /**
     * The hex color of the player's groups.
     *
     * @var string
     */
    protected string $groupColor;

    /**
     * If the user is currently banned.
     *
     * @var bool
     */
    protected bool $isBanned;

    /**
     * The date and time the ban will expire (UTC) or null if not banned or ban is permanent.
     *
     * @var Carbon|null
     */
    protected ?Carbon $bannedUntil;

    /**
     * The number of active bans a user has, or null if staff.
     *
     * @var int|null
     */
    protected ?int $activeBanCount;

    /**
     * If the user has their bans hidden.
     *
     * @var bool
     */
    protected bool $displayBans;

    /**
     * Get the player's patreon information.
     *
     * @var Patreon
     */
    protected Patreon $patreon;

    /**
     * If the user is a staff member.
     *
     * @var bool
     */
    protected bool $isStaff;

    /**
     * If the user is an upper staff member.
     *
     * @var bool
     */
    protected bool $isUpperStaff;

    /**
     * If user is an in-game admin.
     *
     * @var bool
     */
    protected bool $inGameAdmin;

    /**
     * The player's company ID.
     *
     * @var int
     */
    protected int $companyId;

    /**
     * The player's company name.
     *
     * @var string
     */
    protected string $companyName;

    /**
     * The player's company tag.
     *
     * @var string
     */
    protected string $companyTag;

    /**
     * If the player is in a company.
     *
     * @var bool
     */
    protected bool $isInCompany;

    /**
     * The player's company member ID.
     *
     * @var int
     */
    protected int $companyMemberId;

    /**
     * The player's Discord Snowflake.
     *
     * @var string|null
     */
    protected ?string $discordSnowflake;

    /**
     * The player's history of company memberships sorted from the newest.
     *
     * @var Collection
     */
    protected Collection $companyHistory;

    /**
     * Create a new Player instance.
     *
     * @param  Client  $client
     * @param  array  $player
     * @return void
     */
    public function __construct(Client $client, array $player)
    {
        parent::__construct($client, $player);

        $this->id = $this->getValue('id');
        $this->name = $this->getValue('name');
        $this->avatar = $this->getValue('avatar');
        $this->smallAvatar = $this->getValue('smallAvatar');
        $this->joinDate = new Carbon($this->getValue('joinDate'), 'UTC');
        $this->steamID64 = $this->getValue('steamID');
        $this->groupId = $this->getValue('groupID');
        $this->groupName = $this->getValue('groupName');
        $this->groupColor = $this->getValue('groupColor');

        $bannedUntil = $this->getValue('bannedUntil');
        $this->bannedUntil = $bannedUntil ? new Carbon($bannedUntil, 'UTC') : null;

        $this->isBanned = $this->getValue('banned');
        $this->activeBanCount = $this->getValue('bansCount');
        $this->displayBans = $this->getValue('displayBans', false);

        $this->patreon = new Patreon($client, $this->getValue('patreon', []));

        $history = new Collection($this->getValue('vtcHistory', []));
        $this->companyHistory = $history->map(fn (array $entry) => new PlayerCompanyHistory($client, $entry));

        $this->isStaff = $this->getValue('permissions.isStaff', false);
        $this->isUpperStaff = $this->getValue('permissions.isUpperStaff', false);
        $this->inGameAdmin = $this->getValue('permissions.isGameAdmin', false);
        $this->companyId = $this->getValue('vtc.id');
        $this->companyName = $this->getValue('vtc.name');
        $this->companyTag = $this->getValue('vtc.tag');
        $this->isInCompany = $this->getValue('vtc.inVTC', false);
        $this->companyMemberId = $this->getValue('vtc.memberID');
        $this->discordSnowflake = $this->getValue('discordSnowflake');
    }

    /**
     * Get the player's ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the name of the player.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the URL of the player's avatar.
     *
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * Get the URL of the player's small avatar.
     *
     * @return string
     */
    public function getSmallAvatar(): string
    {
        return $this->smallAvatar;
    }

    /**
     * Get the date which the player joined.
     *
     * @return Carbon
     */
    public function getJoinDate(): Carbon
    {
        return $this->joinDate;
    }

    /**
     * Get the player's Steam ID.
     *
     * @return string
     */
    public function getSteamID64(): string
    {
        return $this->steamID64;
    }

    /**
     * Get the player's group ID.
     *
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }

    /**
     * Get the name of the player's group.
     *
     * @return string
     */
    public function getGroupName(): string
    {
        return $this->groupName;
    }

    /**
     * Get the player's group color.
     *
     * @return string
     */
    public function getGroupColor(): string
    {
        return $this->groupColor;
    }

    /**
     * Check if the player is banned.
     *
     * @return bool
     */
    public function isBanned(): bool
    {
        return $this->isBanned;
    }

    /**
     * If the player is banned, get the date they are banned until.
     *
     * @return Carbon|null
     */
    public function getBannedUntilDate(): ?Carbon
    {
        return $this->bannedUntil;
    }

    /**
     * Get the player's number of active bans, or null if staff.
     *
     * @return int|null
     */
    public function getActiveBanCount(): ?int
    {
        return $this->activeBanCount;
    }

    /**
     * Check if the player has their bans hidden.
     *
     * @return bool
     */
    public function hasBansHidden(): bool
    {
        return !$this->displayBans;
    }

    /**
     * Get the player's patreon information.
     *
     * @return Patreon
     *
     * @deprecated Renamed to a proper get method.
     * @see Player::getPatreon()
     */
    public function patreon(): Patreon
    {
        return $this->patreon;
    }

    /**
     * Get the player's Patreon information.
     *
     * @return Patreon
     */
    public function getPatreon(): Patreon
    {
        return $this->patreon;
    }

    /**
     * Check if the player is a staff member.
     *
     * @return bool
     */
    public function isStaff(): bool
    {
        return $this->isStaff;
    }

    /**
     * Check if the player is an upper staff member.
     *
     * @return bool
     */
    public function isUpperStaff(): bool
    {
        return $this->isUpperStaff;
    }

    /**
     * Check if the player is an in-game admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->inGameAdmin;
    }

    /**
     * Get the player's company ID.
     *
     * @return int
     */
    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    /**
     * Get the name of the player's company.
     *
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * Get the tag of the player's company.
     *
     * @return string
     */
    public function getCompanyTag(): string
    {
        return $this->companyTag;
    }

    /**
     * Check if the player is in a company.
     *
     * @return bool
     */
    public function isInCompany(): bool
    {
        return $this->isInCompany;
    }

    /**
     * Get the player's company member ID.
     *
     * @return int
     */
    public function getCompanyMemberId(): int
    {
        return $this->companyMemberId;
    }

    /**
     * Get the player's history of company memberships.
     *
     * @return Collection
     */
    public function getCompanyHistory(): Collection
    {
        return $this->companyHistory;
    }

    /**
     * Get the player's Discord Snowflake.
     *
     * @return string|null
     */
    public function getDiscordSnowflake(): ?string
    {
        return $this->discordSnowflake;
    }

    /**
     * Get the player's bans.
     *
     * @return Collection
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function getBans(): Collection
    {
        return (new BanRequest($this->client, $this->id))->get();
    }

    /**
     * Get events created by the player.
     *
     * @return Collection
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function getEvents(): Collection
    {
        $request = new EventUserRequest(
            $this->client,
            $this->id,
        );

        return $request->get();
    }

    /**
     * Get the player's company.
     *
     * @return Company|null
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function getCompany(): ?Company
    {
        $company = null;

        if ($this->isInCompany()) {
            $request = new CompanyRequest(
                $this->client,
                $this->companyId,
            );

            $company = $request->get();
        }

        return $company;
    }

    /**
     * Get the CompanyMember instance for the player.
     *
     * @return CompanyMember|null
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function getCompanyMember(): ?CompanyMember
    {
        $member = null;

        if ($this->isInCompany()) {
            $request = new MemberRequest(
                $this->client,
                $this->companyId,
                $this->companyMemberId,
            );

            $member = $request->get();
        }

        return $member;
    }

    /**
     * Get the CompanyRole instance for the player's company role.
     *
     * @return CompanyRole|null
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     *
     * @deprecated Not recommended to use due to another internal request.
     */
    public function getCompanyRole(): ?CompanyRole
    {
        $role = null;

        if ($this->isInCompany()) {
            $member = $this->getCompanyMember();

            $request = new RoleRequest(
                $this->client,
                $this->companyId,
                $member->getRoleId(),
            );

            $role = $request->get();
        }

        return $role;
    }
}
