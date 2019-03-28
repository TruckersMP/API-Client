<?php

namespace TruckersMP\Models;

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
     * @var \DateTime
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
     * If user is an in-game admin.
     *
     * @var bool
     */
    protected $inGameAdmin;

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
        $this->joinDate = $response['joinDate'];
        $this->steamID64 = $response['steamID64'];
        $this->groupID = $response['groupID'];
        $this->groupName = $response['groupName'];
        $this->inGameAdmin = $response['permissions']['isGameAdmin'];
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
     * @return \DateTime
     */
    public function getJoinDate(): \DateTime
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
    public function isAdmin(): bool
    {
        return $this->inGameAdmin;
    }
}
