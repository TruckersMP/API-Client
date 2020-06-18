<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Tests\TestCase;
use TruckersMP\APIClient\Collections\BanCollection;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
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

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetThePlayer()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Player::class, $player);
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAName()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getName());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnAvatar()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getAvatar());

        if ($player->getSmallAvatar() !== null) {
            $this->assertIsString($player->getSmallAvatar());
        }
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAJoinDate()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Carbon::class, $player->getJoinDate());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasASteamId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getSteamID64());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAGroupName()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getGroupName());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAGroupId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getGroupId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testIfItIsBanned()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isBanned());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasABannedUntilDate()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(Carbon::class, $player->getBannedUntilDate());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testIfBansAreHidden()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->hasBansHidden());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasIfAdmin()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isAdmin());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasACompanyId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getCompanyId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasACompanyName()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getCompanyName());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasACompanyTag()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsString($player->getCompanyTag());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testIfInACompany()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsBool($player->isInCompany());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAMemberId()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertIsInt($player->getCompanyMemberId());
    }

    /**
     * @throws ClientExceptionInterface
     * @throws PageNotFoundException
     * @throws PhpfastcacheInvalidArgumentException
     * @throws RequestException
     */
    public function testItHasADiscordSnowflake()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        if ($player->getDiscordSnowflake() == null) {
            $this->assertNull($player->getDiscordSnowflake());
        } else {
            $this->assertIsString($player->getDiscordSnowflake());
        }
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetThePlayersBans()
    {
        $bans = $this->playerBans(self::TEST_ACCOUNT);

        $this->assertInstanceOf(BanCollection::class, $bans);

        $player = $this->player(self::TEST_ACCOUNT);

        $this->assertInstanceOf(BanCollection::class, $player->getBans());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetThePlayersCompany()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $company = $player->getCompany();

        if ($player->isInCompany()) {
            $this->assertInstanceOf(Company::class, $company);
        } else {
            $this->assertNull($company);
        }
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetThePlayersCompanyMember()
    {
        $player = $this->player(self::TEST_ACCOUNT);

        $member = $player->getCompanyMember();

        if ($player->isInCompany()) {
            $this->assertInstanceOf(CompanyMember::class, $member);
        } else {
            $this->assertNull($member);
        }
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetThePlayersCompanyRole()
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
