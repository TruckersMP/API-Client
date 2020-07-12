<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\APIClient\Collections\BanCollection;
use TruckersMP\APIClient\Models\Company;
use TruckersMP\APIClient\Models\CompanyMember;
use TruckersMP\APIClient\Models\CompanyRole;
use TruckersMP\APIClient\Models\Player;

class PlayerTest extends TestCase
{
    /**
     * The ID of the player to use in the tests.
     */
    private const TEST_ACCOUNT = 28159;

    /** @test */
    public function it_can_get_a_specific_player()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Player::class, $player);
    }

    /** @test */
    public function it_has_an_id()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getId());
    }

    /** @test */
    public function it_has_a_name()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getName());
    }

    /** @test */
    public function it_has_an_avatar()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getAvatar());

        if ($player->getSmallAvatar() !== null) {
            $this->assertIsString($player->getSmallAvatar());
        }
    }

    /** @test */
    public function it_has_a_join_date()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Carbon::class, $player->getJoinDate());
    }

    /** @test */
    public function it_has_a_steam_id()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getSteamID64());
    }

    /** @test */
    public function it_has_a_group_name()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getGroupName());
    }

    /** @test */
    public function it_has_a_group_id()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getGroupId());
    }

    /** @test */
    public function it_has_a_group_color()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getGroupColor());
    }

    /** @test */
    public function if_it_is_banned()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isBanned());
    }

    /** @test */
    public function it_has_a_banned_until_date()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Carbon::class, $player->getBannedUntilDate());
    }

    /** @test */
    public function if_it_has_bans_hidden()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->hasBansHidden());
    }

    /** @test */
    public function if_it_is_a_staff_member()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isStaff());
    }

    /** @test */
    public function if_it_is_an_upper_staff_member()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isUpperStaff());
    }

    /** @test */
    public function if_it_is_an_admin()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isAdmin());
    }

    /** @test */
    public function it_has_a_company_id()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getCompanyId());
    }

    /** @test */
    public function it_has_a_company_name()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getCompanyName());
    }

    /** @test */
    public function it_has_a_company_tag()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getCompanyTag());
    }

    /** @test */
    public function if_it_is_in_a_company()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isInCompany());
    }

    /** @test */
    public function it_has_a_member_id()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getCompanyMemberId());
    }

    /** @test */
    public function it_has_a_discord_snowflake()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        // We have to check if the Discord Snowflake is null first and then
        // run a test to assert the value is null. Otherwise the test would
        // fail because no tests would have run.
        if ($player->getDiscordSnowflake() === null) {
            $this->assertNull($player->getDiscordSnowflake());
        } else {
            $this->assertIsString($player->getDiscordSnowflake());
        }
    }

    /** @test */
    public function it_can_get_the_players_bans()
    {
        $bans = $this->playerBans(self::TEST_ACCOUNT);

        $this->assertInstanceOf(BanCollection::class, $bans);

        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(BanCollection::class, $player->getBans());
    }

    /** @test */
    public function it_can_get_the_players_company()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $company = $player->getCompany();

        if ($player->isInCompany()) {
            $this->assertInstanceOf(Company::class, $company);
        } else {
            $this->assertNull($company);
        }
    }

    /** @test */
    public function it_can_get_the_players_company_member()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $member = $player->getCompanyMember();

        if ($player->isInCompany()) {
            $this->assertInstanceOf(CompanyMember::class, $member);
        } else {
            $this->assertNull($member);
        }
    }

    /** @test */
    public function it_can_get_the_players_company_role()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $role = $player->getCompanyRole();

        if ($player->isInCompany()) {
            $this->assertInstanceOf(CompanyRole::class, $role);
        } else {
            $this->assertNull($role);
        }
    }
}
