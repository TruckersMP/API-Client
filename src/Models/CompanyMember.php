<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;

class CompanyMember
{
    /**
     * The players member id within the company.
     *
     * @var int
     */
    protected $id;

    /**
     * The players account id.
     *
     * @var int
     */
    protected $userId;

    /**
     * The players username.
     *
     * @var string
     */
    protected $username;

    /**
     * The players steam id.
     *
     * @var string
     */
    protected $steamId;

    /**
     * The players role id within the company.
     *
     * @var int
     */
    protected $roleId;

    /**
     * The players role within the company.
     *
     * @var string
     */
    protected $role;

    /**
     * The date the player joined the company.
     *
     * @var \Carbon\Carbon
     */
    protected $joinDate;

    /**
     * Create a new CompanyMember instance.
     *
     * @param array $member
     */
    public function __construct(array $member)
    {
        $this->id = $member['id'];
        $this->userId = $member['user_id'];
        $this->username = $member['username'];
        $this->steamId = $member['steam_id'];
        $this->roleId = $member['role_id'];
        $this->role = $member['role'];
        $this->joinDate = new Carbon($member['joinDate'], 'UTC');
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getSteamId(): string
    {
        return $this->steamId;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * @return \Carbon\Carbon
     */
    public function getJoinDate(): Carbon
    {
        return $this->joinDate;
    }
}
