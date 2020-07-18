<?php

namespace Tests\Unit;

use Tests\TestCase;

class ChecksumTest extends TestCase
{
    /** @test */
    public function it_has_a_dll()
    {
        $version = $this->version();

        $this->assertIsString($version->getATSMPChecksum()->getDLL());
    }

    /** @test */
    public function it_has_an_adb()
    {
        $version = $this->version();

        $this->assertIsString($version->getATSMPChecksum()->getADB());
    }
}
