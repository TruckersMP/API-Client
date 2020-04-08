<?php

namespace Tests\Unit;

use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Tests\TestCase;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;

class ChecksumTest extends TestCase
{
    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasADLL()
    {
        $version = $this->version();

        $this->assertIsString($version->getATSMPChecksum()->getDLL());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnADB()
    {
        $version = $this->version();

        $this->assertIsString($version->getATSMPChecksum()->getADB());
    }
}
