<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use Illuminate\Support\Collection;
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
     * URL to the avatar used on the website.
     *
     * @var string
     */
    protected string $avatar;

    /**
     * The player's Steam ID.
     *
     * @var string
     */
    protected string $steamId;

    /**
     * The player's roles within the company.
     *
     * @var Collection
     */
    protected Collection $roles;

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
        $this->avatar = $this->getValue('avatar');
        $this->steamId = (string) $this->getValue('steam_id');

        $roles = new Collection($this->getValue('roles', []));
        $this->roles = $roles->map(fn (array $role) => new CompanyRole($client, $role));

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
     * Get the URL of the member's avatar.
     *
     * @return string
     */
    public function getAvatar(): string
    {
        return $this->avatar;
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
     * Get the roles of the member within the company.
     *
     * @return Collection
     */
    public function getRoles(): Collection
    {
        return $this->roles;
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
