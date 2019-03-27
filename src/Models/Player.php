<?php

namespace TruckersMP\Models;

use TruckersMP\Exceptions\PlayerNotFoundException;

class Player
{
    /**
     * User ID.
     *
     * @var int
     */
    public $id;

    /**
     * Username.
     *
     * @var string
     */
    public $name;

    /**
     * Avatar URL.
     *
     * @var string
     */
    public $avatar;

    /**
     * Date and time user joined.
     *
     * @var \DateTime
     */
    public $joinDate;

    /**
     * User's associated SteamID.
     *
     * @var string
     */
    public $steamID64;

    /**
     * Group ID of user.
     *
     * @var int
     */
    public $groupID;

    /**
     * Human readable group name.
     *
     * @var string
     */
    public $groupName;

    /**
     * If user is an in-game admin.
     *
     * @var bool
     */
    public $inGameAdmin;

    /**
     * Player constructor.
     *
     * @param array $response
     *
     * @throws \TruckersMP\Exceptions\PlayerNotFoundException
     */
    public function __construct(array $response)
    {
        if ($response['error']) {
            throw new PlayerNotFoundException($response['response']);
        }

        $this->id          = $response['response']['id'];
        $this->name        = $response['response']['name'];
        $this->avatar      = $response['response']['avatar'];
        $this->joinDate    = $response['response']['joinDate'];
        $this->steamID64   = $response['response']['steamID64'];
        $this->groupID     = $response['response']['groupID'];
        $this->groupName   = $response['response']['groupName'];
        $this->inGameAdmin = $response['response']['permissions']['isGameAdmin'];
    }
}
