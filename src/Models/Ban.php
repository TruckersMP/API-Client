<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use TruckersMP\APIClient\Client;

class Ban extends Model
{
    /**
     * The time the ban will expire.
     *
     * @var Carbon|null
     */
    protected ?Carbon $expiration;

    /**
     * The time the ban was issued.
     *
     * @var Carbon
     */
    protected Carbon $timeAdded;

    /**
     * If the ban is still active.
     *
     * @var bool
     */
    protected bool $active;

    /**
     * The reason for the ban.
     *
     * @var string
     */
    protected string $reason;

    /**
     * The name of the admin that banned the user.
     *
     * @var string
     */
    protected string $adminName;

    /**
     * The TruckersMP ID for the admin that banned the user.
     *
     * @var int
     */
    protected int $adminId;

    /**
     * Create a new Ban instance.
     *
     * @param  Client  $client
     * @param  array  $ban
     * @return void
     */
    public function __construct(Client $client, array $ban)
    {
        parent::__construct($client, $ban);

        $expiration = $this->getValue('expiration');
        $this->expiration = $expiration ? new Carbon($expiration, 'UTC') : null;

        $this->timeAdded = new Carbon($this->getValue('timeAdded'), 'UTC');
        $this->active = $this->getValue('active', false);

        if ($this->expiration !== null && $this->active) {
            if ($this->expiration->lessThan(Carbon::now('UTC'))) {
                $this->active = false;
            }
        }

        $this->reason = $this->getValue('reason');
        $this->adminName = $this->getValue('adminName');
        $this->adminId = $this->getValue('adminID');
    }

    /**
     * Get the expiration date of the ban.
     *
     * @return Carbon|null
     */
    public function getExpirationDate(): ?Carbon
    {
        return $this->expiration;
    }

    /**
     * Get the date which the ban was issued.
     *
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->timeAdded;
    }

    /**
     * Determine if the ban is active or not.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * Get the reason why the player was banned.
     *
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * Get the name of the admin who banned the player.
     *
     * @return string
     */
    public function getAdminName(): string
    {
        return $this->adminName;
    }

    /**
     * Get the TMP ID of the admin who banned the player.
     *
     * @return int
     */
    public function getAdminId(): int
    {
        return $this->adminId;
    }
}
