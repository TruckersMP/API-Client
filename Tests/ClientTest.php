<?php

namespace TruckersMP\Tests\API;

use TruckersMP\API\APIClient;

class ClientTest extends \PHPUnit_Framework_TestCase
{

    private $testAccount = 585204;

    private $client;

    public function __construct()
    {
        parent::__construct();
        $this->client = new APIClient;
    }

    public function testPlayerName()
    {
        $player = $this->client->player($this->testAccount); // Special test account that *should* remain static

        $this->assertEquals($player->name, 'tuxytestaccount');
    }

    public function testPlayerGroup()
    {
        $player = $this->client->player($this->testAccount);

        $this->assertEquals($player->groupID, 1);
        $this->assertEquals($player->groupName, 'Player');
    }

    public function testPlayerBans()
    {
        $bans = $this->client->bans($this->testAccount);

        $this->assertEquals($bans[0]->expires, '2016-06-19 13:00:00');
        $this->assertEquals($bans[0]->created, '2016-06-19 10:08:26');
        $this->assertEquals($bans[0]->reason, 'Test ban');

    }
}
