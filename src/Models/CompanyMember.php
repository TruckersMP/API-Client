<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class CompanyMember extends Model
{
    /**
     * The player's member ID within the company.
     *
     * @var int
     */
    protected int $id;

    /**
     * The player's account ID.
     *
     * @var int
     */
    protected int $userId;

    /**
     * The player's username.
     *
     * @var string
     */
    protected string $username;

    /**
     * The player's Steam ID.
     *
     * @var string
     */
    protected string $steamId;

    /**
     * The player's role ID within the company.
     *
     * @var int
     */
    protected int $roleId;

    /**
     * The player's role within the company.
     *
     * @var string
     */
    protected string $role;

    /**
     * If the member has owner permissions.
     *
     * @var bool
     */
    protected bool $owner;

    /**
     * The date the player joined the company.
     *
     * @var Carbon
     */
    protected Carbon $joinDate;

    /**
     * Create a new CompanyMember instance.
     *
     * @param  Client  $client
     * @param  array  $member
     * @return void
     */
    public function __construct(Client $client, array $member)
    {
        parent::__construct($client, $member);

        $this->id = $this->getValue('id');
        $this->userId = $this->getValue('user_id');
        $this->username = $this->getValue('username');
        $this->steamId = (string) $this->getValue('steam_id');
        $this->roleId = $this->getValue('role_id');
        $this->role = $this->getValue('role');
        $this->owner = $this->getValue('is_owner', false);
        $this->joinDate = new Carbon($this->getValue('joinDate'), 'UTC');
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
     * Get the name of member's role.
     *
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }

    /**
     * Check whether the member has owner permissions.
     *
     * @return bool
     */
    public function isOwner(): bool
    {
        return $this->owner;
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
