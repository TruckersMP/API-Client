<?php

namespace TruckersMP\Models;

use Carbon\Carbon;

class BanModel
{
    /**
     * The Time and Date when the ban expires.
     *
     * @var Carbon|null
     */
    protected $expires;

    /**
     * The Time and Date when the ban was created.
     *
     * @var Carbon
     */
    protected $created;

    /**
     * Is the ban currently active?
     *
     * @var bool
     */
    protected $active;

    /**
     * The ban reason.
     *
     * @var string
     */
    protected $reason;

    /**
     * The Admin's name.
     *
     * @var string
     */
    protected $adminName;

    /**
     * Admin's ID.
     *
     * @var int
     */
    protected $adminID;

    /**
     * BanModel constructor.
     *
     * @param array $ban
     */
    public function __construct(array $ban)
    {
        // Expiration
        if ($ban['expiration'] === null) {
            $this->expires = null;
        } else {
            $this->expires = new Carbon($ban['expiration'], 'UTC');
        }

        // Time Added
        $this->created = new Carbon($ban['timeAdded'], 'UTC');

        // Active
        $this->active = $ban['active'];
        if (!is_null($this->expires) && $this->active) {
            if (!$this->expires->greaterThan(Carbon::now('UTC'))) {
                $this->active = false;
            }
        }

        $this->reason = $ban['reason'];
        $this->adminName = $ban['adminName'];
        $this->adminID = $ban['adminID'];
    }

    /**
     * @return Carbon|null
     */
    public function getExpires(): ?Carbon
    {
        return $this->expires;
    }

    /**
     * @return Carbon
     */
    public function getCreated(): Carbon
    {
        return $this->created;
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
    public function getAdminID(): int
    {
        return $this->adminID;
    }
}
