<?php

namespace TruckersMP\Models;

use Carbon\Carbon;

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
     * Create a new Player instance.
     *
     * @param array $player
     *
     * @throws \Exception
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
}
