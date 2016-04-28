<?php

namespace truckersmp\Test;

use truckersmp\tmpapilib;

class ClientTest extends \PHPUnit_Framework_TestCase
{

    public function testPlayerName()
    {
        $client = new tmpapilib();
        $player = $client->player(585204); // Special test account that *should* remain static

        $this->assertEquals($player['response']['name'], 'tuxytestaccount');
    }
}
