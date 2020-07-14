<?php

namespace Tests\Unit;

use Tests\TestCase;

class PlayerPatreonTest extends TestCase
{
    /**
     * The ID of the player to use in the tests.
     */
    private const TEST_ACCOUNT = 28159;

    /**
     * The ID of the patron to use in the tests.
     */
    private const PATRON_TEST_ACCOUNT = 1111;

    /** @test */
    public function it_is_a_patron()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->patreon()->isPatron());
        $this->assertFalse($player->patreon()->isPatron());

        // Test patron player
        $patronPlayer = $this->player(self::PATRON_TEST_ACCOUNT);

        $this->assertIsBool($patronPlayer->patreon()->isPatron());
        $this->assertTrue($patronPlayer->patreon()->isPatron());
    }

    /** @test */
    public function it_is_active()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->patreon()->isActive());
        $this->assertFalse($player->patreon()->isActive());

        // Test patron player
        $patronPlayer = $this->player(self::PATRON_TEST_ACCOUNT);

        $this->assertIsBool($patronPlayer->patreon()->isActive());
        $this->assertTrue($patronPlayer->patreon()->isActive());
    }

    /** @test */
    public function it_has_a_color()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertNull($player->patreon()->getColor());

        // Test patron player
        $patronPlayer = $this->player(self::PATRON_TEST_ACCOUNT);

        $this->assertIsString($patronPlayer->patreon()->getColor());
    }

    /** @test */
    public function it_has_a_tier_id()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertNull($player->patreon()->getTierId());

        // Test patron player
        $patronPlayer = $this->player(self::PATRON_TEST_ACCOUNT);

        $this->assertIsInt($patronPlayer->patreon()->getTierId());
    }

    /** @test */
    public function it_has_a_current_pledge()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertNull($player->patreon()->getCurrentPledge());

        // Test patron player
        $patronPlayer = $this->player(self::PATRON_TEST_ACCOUNT);

        $this->assertIsInt($patronPlayer->patreon()->getCurrentPledge());
    }

    /** @test */
    public function it_has_a_lifetime_pledge()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertNull($player->patreon()->getLifetimePledge());

        // Test patron player
        $patronPlayer = $this->player(self::PATRON_TEST_ACCOUNT);

        $this->assertIsInt($patronPlayer->patreon()->getLifetimePledge());
    }

    /** @test */
    public function it_has_a_next_pledge()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertNull($player->patreon()->getNextPledge());

        // Test patron player
        $patronPlayer = $this->player(self::PATRON_TEST_ACCOUNT);

        $this->assertIsInt($patronPlayer->patreon()->getNextPledge());
    }

    /** @test */
    public function it_is_hidden()
    {
        // Test non patron player
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertNull($player->patreon()->isHidden());

        // Test patron player
        $patronPlayer = $this->player(self::PATRON_TEST_ACCOUNT);

        $this->assertFalse($patronPlayer->patreon()->isHidden());
    }
}
