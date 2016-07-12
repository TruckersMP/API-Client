<?php


namespace TruckersMP\Types;

use Carbon\Carbon;
use TruckersMP\API\APIClient;

class Ban
{
    /**
     * Time and Date when the ban expires.
     * @var Carbon
     */
    public $expires;
    /**
     * Time and Date when the ban was created.
     * @var Carbon
     */
    public $created;
    /**
     * True if ban is currently active
     * @var boolean
     */
    public $active;
    /**
     * Reason for the ban
     * @var string
     */
    public $reason;
    /**
     * Admin's name
     * @var string
     */
    public $adminName;
    /**
     * Admin's ID
     * @var integer
     */
    public $adminID;

    /**
     * Ban constructor.
     * @param array $ban
     */
    public function __construct($ban)
    {
        $this->expires = new Carbon($ban['expiration'], 'UTC');
        $this->created = new Carbon($ban['timeAdded'], 'UTC');
        $this->active = $ban['active'];

        $this->reason = $ban['reason'];
        $this->adminName = $ban['adminName'];
        $this->adminID = $ban['adminID'];

    }
}
