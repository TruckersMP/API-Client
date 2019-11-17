<?php

namespace TruckersMP\Tests\tests;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use TruckersMP\Client;

class VersionTest extends TestCase
{
    /**
     * @var \TruckersMP\Client
     */
    protected $client;

    /**
     * Create a new VersionTest instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testWeCanGetTheVersionDetails()
    {
        $version = $this->client->version();

        $this->assertIsString($version->getVersion()->human);
        $this->assertIsString($version->getVersion()->stage);
        $this->assertIsString($version->getVersion()->nummeric);

        $this->assertIsString($version->getChecksum()->atsmp->dll);
        $this->assertIsString($version->getChecksum()->atsmp->adb);
        $this->assertIsString($version->getChecksum()->ets2mp->dll);
        $this->assertIsString($version->getChecksum()->ets2mp->adb);

        $this->assertInstanceOf(Carbon::class, $version->getReleased());

        $this->assertIsString($version->getSupport()->ets2);
        $this->assertIsString($version->getSupport()->ats);
    }
}
