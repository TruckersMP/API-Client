<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\Checksum;
use TruckersMP\APIClient\Models\Version;

class VersionTest extends TestCase
{
    use MockModelData;

    /**
     * A Version model instance with mocked data.
     *
     * @var Version
     */
    private Version $version;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('version.json');

        $this->version = new Version($this->client, $data);
    }

    public function testItHasAVersion()
    {
        $this->assertSame('1.2.3.4.5', $this->version->getName());
        $this->assertSame('12345', $this->version->getNumeric());
    }

    public function testItHasAStage()
    {
        $this->assertSame('Alpha', $this->version->getStage());
    }

    public function testItHasAnEts2Checksum()
    {
        $checksum = $this->version->getETS2MPChecksum();

        $this->assertInstanceOf(Checksum::class, $checksum);
        $this->assertSame('ets2mp_checksum_dll', $checksum->getDLL());
        $this->assertSame('ets2mp_checksum_adb', $checksum->getADB());
    }

    public function testItHasAnAtsChecksum()
    {
        $checksum = $this->version->getATSMPChecksum();

        $this->assertInstanceOf(Checksum::class, $checksum);
        $this->assertSame('atsmp_checksum_dll', $checksum->getDLL());
        $this->assertSame('atsmp_checksum_adb', $checksum->getADB());
    }

    public function testItHasATime()
    {
        $this->assertDate('2023-01-04 11:20:03', $this->version->getTime());
    }

    public function testItHasAnEts2Version()
    {
        $this->assertSame('1.46.2.13s', $this->version->getSupportedETS2GameVersion());
    }

    public function testItHasAnAtsVersion()
    {
        $this->assertSame('1.46.2.11s', $this->version->getSupportedATSGameVersion());
    }
}
