<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;

class CompanyBan
{
    /**
     * The ID of the ban.
     *
     * @var int
     */
    protected $id;

    /**
     * The ID of the user.
     *
     * @var int
     */
    protected $userId;

    /**
     * The username of the user.
     *
     * @var string
     */
    protected $username;

    /**
     * The Steam ID of the user.
     *
     * @var int
     */
    protected $steamId;

    /**
     * The role ID of the user.
     *
     * @var int
     */
    protected $roleId;

    /**
     * The role name of the user.
     *
     * @var string
     */
    protected $roleName;

    /**
     * The date at which the user joined the company.
     *
     * @var Carbon
     */
    protected $joinDate;

    /**
     * Create a new CompanyBan instance.
     *
     * @param  array  $ban
     * @return void
     */
    public function __construct(array $ban)
    {
        $this->id = $ban['id'];
        $this->userId = $ban['user_id'];
        $this->username = $ban['username'];
        $this->steamId = $ban['steam_id'];
        $this->roleId = $ban['role_id'];
        $this->roleName = $ban['role'];
        $this->joinDate = new Carbon($ban['joinDate'], 'UTC');
    }

    /**
     * Get the ID of the ban.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the ID of the user.
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Get the username of the user.
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Get the Steam ID of the user.
     *
     * @return int
     */
    public function getSteamId(): int
    {
        return $this->steamId;
    }

    /**
     * Get the ID of the member's role.
     *
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * Get the name of the member's role.
     *
     * @return string
     */
    public function getRoleName(): string
    {
        return $this->roleName;
    }

    /**
     * Get the date the member joined the company.
     *
     * @return Carbon
     */
    public function getJoinDate(): Carbon
    {
        return $this->joinDate;
    }
}
