<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\Models\Company;
use TruckersMP\Models\Game;
use TruckersMP\Models\Social;

class CompanyTest extends TestCase
{
    const TEST_COMPANY = 1;

    /**
     * @throws \Http\Client\Exception
     */
    public function testWeCanGetACompany()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertInstanceOf(Company::class, $company);
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAnId()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsInt($company->getId());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAName()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsString($company->getName());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAnOwnerId()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsInt($company->getOwnerId());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAnOwnerName()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsString($company->getOwnerName());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasASlogan()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsString($company->getSlogan());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasATag()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsString($company->getTag());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasALogo()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsString($company->getLogo());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasACover()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsString($company->getCover());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasInformation()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsString($company->getInformation());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasRules()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsString($company->getRules());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasRequirements()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsString($company->getRequirements());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasAWebsite()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsString($company->getWebsite());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasSocialInformation()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertInstanceOf(Social::class, $company->getSocial());

        // Twitter
        if ($company->getSocial()->getTwitter() != null) {
            $this->assertIsString($company->getSocial()->getTwitter());
        } else {
            $this->assertNull($company->getSocial()->getTwitter());
        }

        // Facebook
        if ($company->getSocial()->getFacebook() != null) {
            $this->assertIsString($company->getSocial()->getFacebook());
        } else {
            $this->assertNull($company->getSocial()->getFacebook());
        }

        // PlaysTV
        if ($company->getSocial()->getPlays() != null) {
            $this->assertIsString($company->getSocial()->getPlays());
        } else {
            $this->assertNull($company->getSocial()->getPlays());
        }

        // Discord
        if ($company->getSocial()->getDiscord() != null) {
            $this->assertIsString($company->getSocial()->getDiscord());
        } else {
            $this->assertNull($company->getSocial()->getDiscord());
        }

        // YouTube
        if ($company->getSocial()->getYouTube() != null) {
            $this->assertIsString($company->getSocial()->getYouTube());
        } else {
            $this->assertNull($company->getSocial()->getYouTube());
        }
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasSupportedGames()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertInstanceOf(Game::class, $company->getGames());

        $this->assertIsBool($company->getGames()->isAts());
        $this->assertIsBool($company->getGames()->isEts());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasMemberCount()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsInt($company->getMembersCount());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasARecruitmentState()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsString($company->getRecruitment());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasALanguage()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsString($company->getLanguage());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testIfItsVerified()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertIsBool($company->isVerified());
    }

    /**
     * @throws \Http\Client\Exception
     */
    public function testItHasACreatedDate()
    {
        $company = $this->client->company(self::TEST_COMPANY);

        $this->assertInstanceOf(Carbon::class, $company->getCreatedDate());
    }
}
