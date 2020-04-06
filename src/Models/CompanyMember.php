<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use Exception;

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
     * @var Carbon
     */
    protected $joinDate;

    /**
     * Create a new CompanyMember instance.
     *
     * @param  array  $member
     * @return void
     *
     * @throws Exception
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
     * Get the company member ID.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the TMP player ID of the member.
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * Get the name of the member.
     *
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * Get the Steam ID of the member.
     *
     * @return string
     */
    public function getSteamId(): string
    {
        return $this->steamId;
    }

    /**
     * Get the Role ID of the member.
     *
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->roleId;
    }

    /**
     * Get the name of members role.
     *
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * Get the date that the member joined the company.
     *
     * @return Carbon
     */
    public function getJoinDate(): Carbon
    {
        return $this->joinDate;
    }
}
