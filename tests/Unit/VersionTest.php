<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\Models\Checksum;
use TruckersMP\Models\Version;

class VersionTest extends TestCase
{
    /**
     * @throws \Http\Client\Exception
     */
    public function testWeCanGetTheVersion()
    {
        $version = $this->client->version();

        $this->assertInstanceOf(Version::class, $version);
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAName()
    {
        $version = $this->client->version();

        $this->assertIsString($version->getName());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasANumeric()
    {
        $version = $this->client->version();

        $this->assertIsString($version->getNumeric());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAStage()
    {
        $version = $this->client->version();

        $this->assertIsString($version->getStage());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAnETS2MPChecksum()
    {
        $version = $this->client->version();

        $this->assertInstanceOf(Checksum::class, $version->getETS2MPChecksum());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAnATSMPChecksum()
    {
        $version = $this->client->version();

        $this->assertInstanceOf(Checksum::class, $version->getATSMPChecksum());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasATime()
    {
        $version = $this->client->version();

        $this->assertInstanceOf(Carbon::class, $version->getTime());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasASupportedGameVersion()
    {
        $version = $this->client->version();

        $this->assertIsString($version->getSupportedGameVersion());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasASupportedATSGameVersion()
    {
        $version = $this->client->version();

        $this->assertIsString($version->getSupportedATSGameVersion());
    }
}
