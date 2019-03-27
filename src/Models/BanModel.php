<?php

namespace TruckersMP\Models;

use Carbon\Carbon;

class BanModel
{
    /**
     * Time and Date when the ban expires.
     *
     * @var Carbon|null
     */
    public $expires;

    /**
     * Time and Date when the ban was created.
     *
     * @var Carbon
     */
    public $created;

    /**
     * True if ban is currently active.
     *
     * @var bool
     */
    public $active;

    /**
     * Reason for the ban.
     *
     * @var string
     */
    public $reason;

    /**
     * Admin's name.
     *
     * @var string
     */
    public $adminName;

    /**
     * Admin's ID.
     *
     * @var int
     */
    public $adminID;

    /**
     * BanModel constructor.
     *
     * @param array $ban
     */
    public function __construct($ban)
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

        $this->reason    = $ban['reason'];
        $this->adminName = $ban['adminName'];
        $this->adminID   = $ban['adminID'];
    }
}
