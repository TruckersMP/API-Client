<?php

namespace TruckersMP\Models;

use Carbon\Carbon;
use TruckersMP\Collections\BanCollection;
use TruckersMP\Requests\BanRequest;
use TruckersMP\Requests\Companies\MemberRequest;
use TruckersMP\Requests\Companies\RoleRequest;
use TruckersMP\Requests\CompanyRequest;

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
     * URL to the small avatar on the website;.
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
     * If the user is currently banned.
     *
     * @var bool
     */
    protected $isBanned;

    /**
     * The date and time the ban will expire (UTC) or null if not banned or ban is permanent.
     *
     * @var \Carbon\Carbon
     */
    protected $bannedUntil;

    /**
     * If the user has their bans hidden.
     *
     * @var bool
     */
    protected $displayBans;

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
     * The players bans.
     *
     * @var \TruckersMP\Collections\BanCollection
     */
    protected $bans;

    /**
     * Create a new Player instance.
     *
     * @param array $player
     *
     * @throws \Exception
     * @throws \Http\Client\Exception
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
        $this->isBanned = $player['banned'];
        $this->bannedUntil = new Carbon($player['bannedUntil'], 'UTC');
        $this->displayBans = $player['displayBans'];
        $this->inGameAdmin = $player['permissions']['isGameAdmin'];
        $this->companyId = $player['vtc']['id'];
        $this->companyName = $player['vtc']['name'];
        $this->companyTag = $player['vtc']['tag'];
        $this->isInCompany = $player['vtc']['inVTC'];
        $this->companyMemberId = $player['vtc']['memberID'];

        // Get the player bans
        $this->bans = (new BanRequest($this->id))->get();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @return string
     */
    public function getSmallAvatar(): string
    {
        return $this->smallAvatar;
    }

    /**
     * @return Carbon
     */
    public function getJoinDate(): Carbon
    {
        return $this->joinDate;
    }

    /**
     * @return string
     */
    public function getSteamID64(): string
    {
        return $this->steamID64;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }

    /**
     * @return string
     */
    public function getGroupName(): string
    {
        return $this->groupName;
    }

    /**
     * @return bool
     */
    public function isBanned(): bool
    {
        return $this->isBanned;
    }

    /**
     * @return \Carbon\Carbon|null
     */
    public function getBannedUntilDate(): ?Carbon
    {
        return $this->bannedUntil;
    }

    /**
     * @return bool
     */
    public function hasBansHidden(): bool
    {
        return !$this->displayBans;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->inGameAdmin;
    }

    /**
     * @return int
     */
    public function getCompanyId(): int
    {
        return $this->companyId;
    }

    /**
     * @return string
     */
    public function getCompanyName(): string
    {
        return $this->companyName;
    }

    /**
     * @return string
     */
    public function getCompanyTag(): string
    {
        return $this->companyTag;
    }

    /**
     * @return bool
     */
    public function isInCompany(): bool
    {
        return $this->isInCompany;
    }

    /**
     * @return int
     */
    public function getCompanyMemberId(): int
    {
        return $this->companyMemberId;
    }

    /**
     * @return \TruckersMP\Collections\BanCollection
     */
    public function getBans(): BanCollection
    {
        return $this->bans;
    }

    /**
     * @return \TruckersMP\Models\Company|null
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
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
     * @return \TruckersMP\Models\CompanyMember|null
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
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
     * @return \TruckersMP\Models\CompanyRole|null
     *
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
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
