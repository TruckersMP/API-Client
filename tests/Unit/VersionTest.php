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
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testWeCanGetTheVersion()
    {
        $version = $this->version();

        $this->assertInstanceOf(Version::class, $version);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAName()
    {
        $version = $this->version();

        $this->assertIsString($version->getName());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasANumeric()
    {
        $version = $this->version();

        $this->assertIsString($version->getNumeric());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAStage()
    {
        $version = $this->version();

        $this->assertIsString($version->getStage());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAnETS2MPChecksum()
    {
        $version = $this->version();

        $this->assertInstanceOf(Checksum::class, $version->getETS2MPChecksum());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasAnATSMPChecksum()
    {
        $version = $this->version();

        $this->assertInstanceOf(Checksum::class, $version->getATSMPChecksum());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasATime()
    {
        $version = $this->version();

        $this->assertInstanceOf(Carbon::class, $version->getTime());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasASupportedGameVersion()
    {
        $version = $this->version();

        $this->assertIsString($version->getSupportedGameVersion());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasASupportedATSGameVersion()
    {
        $version = $this->version();

        $this->assertIsString($version->getSupportedATSGameVersion());
    }
}
