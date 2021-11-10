<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use Illuminate\Support\Collection;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Requests\BanRequest;
use TruckersMP\APIClient\Requests\Company\MemberRequest;
use TruckersMP\APIClient\Requests\Company\RoleRequest;
use TruckersMP\APIClient\Requests\CompanyRequest;

class Player
{
    /**
     * The ID of the user requested.
     *
     * @var int
     */
    protected $id;

    /**
     * The name of the user.
     *
     * @var string
     */
    protected $name;

    /**
     * URL to the avatar used on the website.
     *
     * @var string
     */
    protected $avatar;

    /**
     * URL to the small avatar on the website.
     *
     * @var string
     */
    protected $smallAvatar;

    /**
     * The date and time the user registered (UTC).
     *
     * @var Carbon
     */
    protected $joinDate;

    /**
     * The SteamID64 of the user.
     *
     * @var string
     */
    protected $steamID64;

    /**
     * The ID of the group the user belongs to.
     *
     * @var int
     */
    protected $groupId;

    /**
     * The name of the group the user belongs to.
     *
     * @var string
     */
    protected $groupName;

    /**
     * The hex color of the players groups.
     *
     * @var string
     */
    protected $groupColor;

    /**
     * If the user is currently banned.
     *
     * @var bool
     */
    protected $isBanned;

    /**
     * The date and time the ban will expire (UTC) or null if not banned or ban is permanent.
     *
     * @var Carbon|null
     */
    protected $bannedUntil;

    /**
     * If the user has their bans hidden.
     *
     * @var bool
     */
    protected $displayBans;

    /**
     * Get the players patreon information.
     *
     * @var Patreon
     */
    protected $patreon;

    /**
     * If the user is a staff member.
     *
     * @var bool
     */
    protected $isStaff;

    /**
     * If the user is an upper staff member.
     *
     * @var bool
     */
    protected $isUpperStaff;

    /**
     * If user is an in-game admin.
     *
     * @var bool
     */
    protected $inGameAdmin;

    /**
     * The players company ID.
     *
     * @var int
     */
    protected $companyId;

    /**
     * The players company name.
     *
     * @var string
     */
    protected $companyName;

    /**
     * The players company tag.
     *
     * @var string
     */
    protected $companyTag;

    /**
     * If the player is in a company.
     *
     * @var bool
     */
    protected $isInCompany;

    /**
     * The players company member id.
     *
     * @var int
     */
    protected $companyMemberId;

    /**
     * The players Discord Snowflake.
     *
     * @var string|null
     */
    protected $discordSnowflake;

    /**
     * Create a new Player instance.
     *
     * @param  array  $player
     * @return void
     */
    public function __construct(array $player)
    {
        $this->id = $player['id'];
        $this->name = $player['name'];
        $this->avatar = $player['avatar'];
        $this->smallAvatar = $player['smallAvatar'];
        $this->joinDate = new Carbon($player['joinDate'], 'UTC');
        $this->steamID64 = $player['steamID64'];
        $this->groupId = $player['groupID'];
        $this->groupName = $player['groupName'];
        $this->groupColor = $player['groupColor'];
        $this->isBanned = $player['banned'];
        $this->bannedUntil = new Carbon($player['bannedUntil'], 'UTC');
        $this->displayBans = $player['displayBans'];

        $this->patreon = new Patreon(
            $player['patreon']['isPatron'],
            $player['patreon']['active'],
            $player['patreon']['color'],
            $player['patreon']['tierId'],
            $player['patreon']['currentPledge'],
            $player['patreon']['lifetimePledge'],
            $player['patreon']['nextPledge'],
            $player['patreon']['hidden']
        );

        $this->isStaff = $player['permissions']['isStaff'];
        $this->isUpperStaff = $player['permissions']['isUpperStaff'];
        $this->inGameAdmin = $player['permissions']['isGameAdmin'];
        $this->companyId = $player['vtc']['id'];
        $this->companyName = $player['vtc']['name'];
        $this->companyTag = $player['vtc']['tag'];
        $this->isInCompany = $player['vtc']['inVTC'];
        $this->companyMemberId = $player['vtc']['memberID'];
        $this->discordSnowflake = $player['discordSnowflake'];
    }

    /**
     * Get the players ID.
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
     * Get the URL of the players avatar.
     *
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * Get the URL of the players small avatar.
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
     * Get the players Steam ID.
     *
     * @return string
     */
    public function getSteamID64(): string
    {
        return $this->steamID64;
    }

    /**
     * Get the players group ID.
     *
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }

    /**
     * Get the name of the players group.
     *
     * @return string
     */
    public function getGroupName(): string
    {
        return $this->groupName;
    }

    /**
     * Get the players group color.
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
     * Check if the player has their bans hidden.
     *
     * @return bool
     */
    public function hasBansHidden(): bool
    {
        return !$this->displayBans;
    }

    /**
     * Get the players patreon information.
     *
     * @return Patreon
     */
    public function patreon(): Patreon
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
     * Get the players company ID.
     *
     * @return int
     */
    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    /**
     * Get the name of the players company.
     *
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * Get the tag of the players company.
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
     * Get the players company member ID.
     *
     * @return int
     */
    public function getCompanyMemberId(): int
    {
        return $this->companyMemberId;
    }

    /**
     * Get the players Discord Snowflake.
     *
     * @return string|null
     */
    public function getDiscordSnowflake(): ?string
    {
        return $this->discordSnowflake;
    }

    /**
     * Get the players bans.
     *
     * @return Collection
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function getBans(): Collection
    {
        return (new BanRequest($this->id))->get();
    }

    /**
     * Get the players company.
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
            $company = (new CompanyRequest($this->companyId))->get();
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
            $member = (new MemberRequest($this->companyId, $this->companyMemberId))->get();
        }

        return $member;
    }

    /**
     * Get the CompanyRole instance for the players company role.
     *
     * @return CompanyRole|null
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function getCompanyRole(): ?CompanyRole
    {
        $role = null;

        if ($this->isInCompany()) {
            $role = (new RoleRequest($this->companyId, $this->getCompanyMember()->getRoleId()))->get();
        }

        return $role;
    }
}
