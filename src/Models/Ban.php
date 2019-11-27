<?php

namespace TruckersMP\Models;

use Carbon\Carbon;

class Ban
{
    /**
     * The time the ban will expire.
     *
     * @var \Carbon\Carbon
     */
    protected $expiration;

    /**
     * The time the ban was issued.
     *
     * @var \Carbon\Carbon
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
     * @param array $ban
     *
     * @throws \Exception
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
     * @return \Carbon\Carbon|null
     */
    public function getExpirationDate(): ?Carbon
    {
        return $this->expiration;
    }

    /**
     * @return \Carbon\Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->timeAdded;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @return string
     */
    public function getAdminName(): string
    {
        return $this->adminName;
    }

    /**
     * @return int
     */
    public function getAdminId(): int
    {
        return $this->adminId;
    }
}
