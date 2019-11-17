<?php

namespace TruckersMP\Tests\tests;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use TruckersMP\Client;
use TruckersMP\Models\BanModel;
use TruckersMP\Models\BansModel;

class BansTest extends TestCase
{
    const TEST_ACCOUNT = 28159;

    /**
     * @var \TruckersMP\Client
     */
    protected $client;

    /**
     * Create a new BansTest instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function testWeCanGetTheUsersBans()
    {
        $bans = $this->client->bans(self::TEST_ACCOUNT);

        if (count($bans->getBans()) > 0) {
            $ban = $bans->getBans()[0];

            if ($ban->getExpires() != null) {
                $this->assertInstanceOf(Carbon::class, $ban->getExpires());
            }

            $this->assertInstanceOf(Carbon::class, $ban->getCreated());
            $this->assertIsBool($ban->isActive());
            $this->assertIsString($ban->getReason());
            $this->assertIsString($ban->getAdminName());
            $this->assertIsInt($ban->getAdminID());

            $this->assertInstanceOf(BanModel::class, $ban);
        } else {
            $this->assertEquals($bans->getBans(), []);
        }

        $this->assertInstanceOf(BansModel::class, $bans);
    }
}
