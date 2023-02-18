<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\Patreon;

class PatreonTest extends TestCase
{
    use MockModelData;

    /**
     * A Patreon model instance filled with mocked data.
     *
     * @var Patreon
     */
    private Patreon $patreon;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('patreon.json');

        $this->patreon = new Patreon($this->client, $data);
    }

    public function testItIsAPatron()
    {
        $this->assertTrue($this->patreon->isPatron());
    }

    public function testItIsActive()
    {
        $this->assertTrue($this->patreon->isActive());
    }

    public function testItHasAColor()
    {
        $this->assertSame('#DAA520', $this->patreon->getColor());
    }

    public function testItHasATierId()
    {
        $this->assertSame(1234567, $this->patreon->getTierId());
    }

    public function testItHasACurrentPledge()
    {
        $this->assertSame(500, $this->patreon->getCurrentPledge());
    }

    public function testItHasALifetimePledge()
    {
        $this->assertSame(150000, $this->patreon->getLifetimePledge());
    }

    public function testItHasANextPledge()
    {
        $this->assertSame(450, $this->patreon->getNextPledge());
    }

    public function testItIsNotHidden()
    {
        $this->assertFalse($this->patreon->isHidden());
    }
}
