<?php

namespace TruckersMP\Models;

use Carbon\Carbon;
use stdClass;
use TruckersMP\Exceptions\PlayerNotFoundException;

class PlayerModel
{
    /**
     * User ID.
     *
     * @var int
     */
    protected $id;

    /**
     * Username.
     *
     * @var string
     */
    protected $name;

    /**
     * Avatar URL.
     *
     * @var string
     */
    protected $avatar;

    /**
     * Date and time user joined.
     *
     * @var Carbon
     */
    protected $joinDate;

    /**
     * User's associated SteamID.
     *
     * @var string
     */
    protected $steamID64;

    /**
     * Group ID of user.
     *
     * @var int
     */
    protected $groupID;

    /**
     * Human readable group name.
     *
     * @var string
     */
    protected $groupName;

    /**
     * If user is banned.
     *
     * @var bool
     */
    protected $isBanned;

    /**
     * The date and time the ban will expire.
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
     * The players VTC information.
     *
     * @var \stdClass
     */
    protected $vtc;

    /**
     * PlayerModel constructor.
     *
     * @param array $response
     * @throws \TruckersMP\Exceptions\PlayerNotFoundException
     */
    public function __construct(array $response)
    {
        if ($response['error']) {
            throw new PlayerNotFoundException($response['response']);
        }

        $response = $response['response'];

        $this->id = $response['id'];
        $this->name = $response['name'];
        $this->avatar = $response['avatar'];
        $this->joinDate = new Carbon($response['joinDate'], 'UTC');
        $this->steamID64 = $response['steamID64'];
        $this->groupID = $response['groupID'];
        $this->groupName = $response['groupName'];
        $this->isBanned = $response['banned'];
        $this->bannedUntil = new Carbon($response['bannedUntil'], 'UTC');
        $this->displayBans = $response['displayBans'];
        $this->inGameAdmin = $response['permissions']['isGameAdmin'];

        $this->vtc = new stdClass();
        $this->vtc->id = $response['vtc']['id'];
        $this->vtc->name = $response['vtc']['name'];
        $this->vtc->tag = $response['vtc']['tag'];
        $this->vtc->inVTC = $response['vtc']['inVTC'];
        $this->vtc->memberID = $response['vtc']['memberID'];
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
    public function getGroupID(): int
    {
        return $this->groupID;
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
     * @return \Carbon\Carbon
     */
    public function isBannedUntil(): Carbon
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
     * @return \stdClass
     */
    public function getVTC(): stdClass
    {
        return $this->vtc;
    }
}
