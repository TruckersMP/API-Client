<?php


namespace TruckersMP\Types;

use Psr\Http\Message\ResponseInterface;
use TruckersMP\Exceptions\PlayerNotFoundException;

class Player
{

    /**
     * User ID
     * @var integer
     */
    public $id;

    /**
     * Username
     * @var string
     */
    public $name;

    /**
     * Avatar URL
     * @var string
     */
    public $avatar;
    
    /**
     * Date and time user joined
     * @var \DateTime
     */
    public $joinDate;

    /**
     * User's associated SteamID
     * @var string
     */
    public $steamID64;

    /**
     * Group ID of user
     * @var integer
     */
    public $groupID;

    /**
     * Human readable group name
     * @var string
     */
    public $groupName;

    /**
     * If user is an in-game admin
     * @var boolean
     */
    public $inGameAdmin;

    /**
     * Player constructor.
     * @param ResponseInterface $response
     * @throws PlayerNotFoundException
     */
    public function __construct(ResponseInterface $response)
    {
        $json = json_decode((string)$response->getBody(), true, 512, JSON_BIGINT_AS_STRING);
        
        if ($json['error']) {
            throw new PlayerNotFoundException($json['response']);
        }

        $this->id           = $json['response']['id'];
        $this->name         = $json['response']['name'];
        $this->avatar       = $json['response']['avatar'];
        $this->joinDate     = $json['response']['joinDate'];
        $this->steamID64    = $json['response']['steamID64'];
        $this->groupID      = $json['response']['groupID'];
        $this->groupName    = $json['response']['groupName'];
        $this->inGameAdmin  = $json['response']['permissions']['isGameAdmin'];
    }
}
