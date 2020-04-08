<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Tests\TestCase;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
use TruckersMP\APIClient\Models\Checksum;
use TruckersMP\APIClient\Models\Version;

class VersionTest extends TestCase
{
    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetTheVersion()
    {
        $version = $this->version();

        $this->assertInstanceOf(Version::class, $version);
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAName()
    {
        $version = $this->version();

        $this->assertIsString($version->getName());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasANumeric()
    {
        $version = $this->version();

        $this->assertIsString($version->getNumeric());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAStage()
    {
        $version = $this->version();

        $this->assertIsString($version->getStage());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnETS2MPChecksum()
    {
        $version = $this->version();

        $this->assertInstanceOf(Checksum::class, $version->getETS2MPChecksum());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnATSMPChecksum()
    {
        $version = $this->version();

        $this->assertInstanceOf(Checksum::class, $version->getATSMPChecksum());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasATime()
    {
        $version = $this->version();

        $this->assertInstanceOf(Carbon::class, $version->getTime());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasASupportedGameVersion()
    {
        $version = $this->version();

        $this->assertIsString($version->getSupportedETS2GameVersion());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasASupportedATSGameVersion()
    {
        $version = $this->version();

        $this->assertIsString($version->getSupportedATSGameVersion());
    }
}
