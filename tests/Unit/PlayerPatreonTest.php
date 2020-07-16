<?php

namespace Tests\Unit;

use Tests\TestCase;

class PlayerPatreonTest extends TestCase
{
    /**
     * The ID of the player to use in the tests.
     */
    private const TEST_ACCOUNT = 28159;

    /** @test */
    public function it_is_a_patron()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->patreon()->isPatron());
    }

    /** @test */
    public function it_is_active()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->patreon()->isActive());
    }

    /** @test */
    public function it_has_a_color()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        if ($player->patreon()->isPatron()) {
            $this->assertIsString($player->patreon()->getColor());
        } else {
            $this->assertNull($player->patreon()->getColor());
        }
    }

    /** @test */
    public function it_has_a_tier_id()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        if ($player->patreon()->isHidden() === false) {
            $this->assertIsInt($player->patreon()->getTierId());
        } else {
            $this->assertNull($player->patreon()->getTierId());
        }
    }

    /** @test */
    public function it_has_a_current_pledge()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        if ($player->patreon()->isHidden() === false) {
            $this->assertIsInt($player->patreon()->getCurrentPledge());
        } else {
            $this->assertNull($player->patreon()->getCurrentPledge());
        }
    }

    /** @test */
    public function it_has_a_lifetime_pledge()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        if ($player->patreon()->isHidden() === false) {
            $this->assertIsInt($player->patreon()->getLifetimePledge());
        } else {
            $this->assertNull($player->patreon()->getLifetimePledge());
        }
    }

    /** @test */
    public function it_has_a_next_pledge()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        if ($player->patreon()->isHidden() === false) {
            $this->assertIsInt($player->patreon()->getNextPledge());
        } else {
            $this->assertNull($player->patreon()->getNextPledge());
        }
    }

    /** @test */
    public function it_is_hidden()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        if ($player->patreon()->isPatron()) {
            $this->assertIsBool($player->patreon()->isHidden());
        } else {
            $this->assertNull($player->patreon()->isHidden());
        }
    }
}
