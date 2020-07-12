<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\APIClient\Models\Checksum;
use TruckersMP\APIClient\Models\Version;

class VersionTest extends TestCase
{
    /** @test */
    public function it_can_get_the_version()
    {
        $version = $this->version();

        $this->assertInstanceOf(Version::class, $version);
    }

    /** @test */
    public function it_has_a_name()
    {
        $version = $this->version();

        $this->assertIsString($version->getName());
    }

    /** @test */
    public function it_has_a_numeric()
    {
        $version = $this->version();

        $this->assertIsString($version->getNumeric());
    }

    /** @test */
    public function it_has_a_stage()
    {
        $version = $this->version();

        $this->assertIsString($version->getStage());
    }

    /** @test */
    public function it_has_an_ets2mp_checksum()
    {
        $version = $this->version();

        $this->assertInstanceOf(Checksum::class, $version->getETS2MPChecksum());
    }

    /** @test */
    public function it_has_an_atsmp_checksum()
    {
        $version = $this->version();

        $this->assertInstanceOf(Checksum::class, $version->getATSMPChecksum());
    }

    /** @test */
    public function it_has_a_time()
    {
        $version = $this->version();

        $this->assertInstanceOf(Carbon::class, $version->getTime());
    }

    /** @test */
    public function it_has_a_supported_ets2_game_version()
    {
        $version = $this->version();

        $this->assertIsString($version->getSupportedETS2GameVersion());
    }

    /** @test */
    public function it_has_a_supported_ats_game_version()
    {
        $version = $this->version();

        $this->assertIsString($version->getSupportedATSGameVersion());
    }
}
