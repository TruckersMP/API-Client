<?php

namespace TruckersMP\APIClient\Models;

use Carbon\Carbon;
use Exception;

class Ban
{
    /**
     * The time the ban will expire.
     *
     * @var Carbon
     */
    protected $expiration;

    /**
     * The time the ban was issued.
     *
     * @var Carbon
     */
    protected $timeAdded;

    /**
     * If the ban is still active.
     *
     * @var bool
     */
    protected $active;

    /**
     * The reason for the ban.
     *
     * @var string
     */
    protected $reason;

    /**
     * The name of the admin that banned the user.
     *
     * @var string
     */
    protected $adminName;

    /**
     * The TruckersMP ID for the admin that banned the user.
     *
     * @var int
     */
    protected $adminId;

    /**
     * Create a new Ban instance.
     *
     * @param  array  $ban
     * @return void
     *
     * @throws Exception
     */
    public function __construct(array $ban)
    {
        // Expiration
        if ($ban['expiration'] !== null) {
            $this->expiration = new Carbon($ban['expiration'], 'UTC');
        } else {
            $this->expiration = null;
        }

        // Time Added
        $this->timeAdded = new Carbon($ban['timeAdded'], 'UTC');

        // Active
        $this->active = boolval($ban['active']);
        if (!is_null($this->expiration) && $this->active) {
            if (!$this->expiration->greaterThan(Carbon::now('UTC'))) {
                $this->active = false;
            }
        }

        $this->reason = $ban['reason'];
        $this->adminName = $ban['adminName'];
        $this->adminId = intval($ban['adminID']);
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
