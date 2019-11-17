<?php

namespace Tests\Unit;

use Tests\TestCase;

class ChecksumTest extends TestCase
{
    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasADLL()
    {
        $version = $this->client->version();

        $this->assertIsString($version->getATSMPChecksum()->getDLL());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAnADB()
    {
        $version = $this->client->version();

        $this->assertIsString($version->getATSMPChecksum()->getADB());
    }
}
