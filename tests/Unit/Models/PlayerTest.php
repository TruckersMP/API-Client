<?php

namespace Tests\Unit\Models;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\Ban;
use TruckersMP\APIClient\Models\Company;
use TruckersMP\APIClient\Models\CompanyMember;
use TruckersMP\APIClient\Models\Patreon;
use TruckersMP\APIClient\Models\Player;
use TruckersMP\APIClient\Models\PlayerCompanyHistory;

class PlayerTest extends TestCase
{
    use MockAPIRequests;
    use MockModelData;

    /**
     * A Player model instance filled with mocked data.
     *
     * @var Player
     */
    private Player $player;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('player.json');

        $this->player = new Player($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(1287455, $this->player->getId());
    }

    public function testItHasAName()
    {
        $this->assertSame('Name', $this->player->getName());
    }

    public function testItHasAnAvatar()
    {
        $this->assertSame('https://static.truckersmp.com/avatarsN/avatar.png', $this->player->getAvatar());
    }

    public function testItHasASmallAvatar()
    {
        $this->assertSame('https://static.truckersmp.com/avatarsN/small/avatar.png', $this->player->getSmallAvatar());
    }

    public function testItHasAJoinDate()
    {
        $this->assertDate('2017-01-09 18:17:28', $this->player->getJoinDate());
    }

    public function testItHasASteamId()
    {
        $this->assertSame('76561198083585955', $this->player->getSteamID64());
    }

    public function testItHasADiscordSnowflake()
    {
        $this->assertSame('168274283414421504', $this->player->getDiscordSnowflake());
    }

    public function testItHasAGroup()
    {
        $this->assertSame(55, $this->player->getGroupId());
        $this->assertSame('#673ab7', $this->player->getGroupColor());
        $this->assertSame('Game Developer', $this->player->getGroupName());
    }

    public function testItIsNotBanned()
    {
        $this->assertFalse($this->player->isBanned());
        $this->assertNull($this->player->getBannedUntilDate());
    }

    public function testItDoesNotHaveBanDetails()
    {
        $this->assertNull($this->player->getActiveBanCount());
        $this->assertTrue($this->player->hasBansHidden());
    }

    public function testItHasPatreonInformation()
    {
        $this->assertInstanceOf(Patreon::class, $this->player->getPatreon());
    }

    public function testItHasPermissions()
    {
        $this->assertTrue($this->player->isStaff());
        $this->assertTrue($this->player->isUpperStaff());
        $this->assertTrue($this->player->isAdmin());
    }

    public function testItHasACompany()
    {
        $this->assertTrue($this->player->isInCompany());

        $this->assertSame(1, $this->player->getCompanyId());
        $this->assertSame('TruckersMP Developers', $this->player->getCompanyName());
        $this->assertSame('TMP-DEV', $this->player->getCompanyTag());
        $this->assertSame(1, $this->player->getCompanyMemberId());
    }

    public function testItHasACompanyHistory()
    {
        $history = $this->player->getCompanyHistory();

        $this->assertInstanceOf(Collection::class, $history);
        $this->assertCount(1, $history);

        $this->assertInstanceOf(PlayerCompanyHistory::class, $history->first());
    }

    public function testItCanGetBans()
    {
        $this->mockRequest('ban.json', 'bans/1287455');

        $bans = $this->player->getBans();

        $this->assertInstanceOf(Collection::class, $bans);
        $this->assertNotEmpty($bans);

        $this->assertInstanceOf(Ban::class, $bans->first());
    }

    public function testItCanGetACompany()
    {
        $this->mockRequest('company.json', 'vtc/1');

        $company = $this->player->getCompany();

        $this->assertInstanceOf(Company::class, $company);
    }

    public function testItCanGetACompanyMember()
    {
        $this->mockRequest('company.member.json', 'vtc/1/member/1');

        $member = $this->player->getCompanyMember();

        $this->assertInstanceOf(CompanyMember::class, $member);
    }
}
