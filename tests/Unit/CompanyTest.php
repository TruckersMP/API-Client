<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\Collections\CompanyCollection;
use TruckersMP\Models\Company;
use TruckersMP\Models\CompanyIndex;
use TruckersMP\Models\Game;
use TruckersMP\Models\Social;

class CompanyTest extends TestCase
{
    /**
     * The ID of the company to use in the tests.
     */
    private const TEST_COMPANY = 1;

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testWeCanGetTheCompanies()
    {
        $companies = $this->companies();

        $this->assertInstanceOf(CompanyIndex::class, $companies);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testWeCanGetTheRecentCompanies()
    {
        $companies = $this->companies()->getRecent();

        $this->assertNotEmpty($companies);

        $this->assertInstanceOf(CompanyCollection::class, $companies);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testWeCanGetTheFeaturedCompanies()
    {
        $companies = $this->companies()->getFeatured();

        $this->assertNotEmpty($companies);

        $this->assertInstanceOf(CompanyCollection::class, $companies);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testWeCanGetTheFeaturedCoverCompanies()
    {
        $companies = $this->companies()->getFeaturedCovered();

        $this->assertNotEmpty($companies);

        $this->assertInstanceOf(CompanyCollection::class, $companies);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testWeCanGetACompany()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertInstanceOf(Company::class, $company);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAnId()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsInt($company->getId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAName()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getName());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAnOwnerId()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsInt($company->getOwnerId());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAnOwnerName()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getOwnerName());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasASlogan()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getSlogan());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasATag()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getTag());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasALogo()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getLogo());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasACover()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getCover());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasInformation()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getInformation());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasRules()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getRules());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasRequirements()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getRequirements());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasAWebsite()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getWebsite());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasSocialInformation()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertInstanceOf(Social::class, $company->getSocial());

        // Twitter
        if ($company->getSocial()->getTwitter() !== null) {
            $this->assertIsString($company->getSocial()->getTwitter());
        }

        // Facebook
        if ($company->getSocial()->getFacebook() !== null) {
            $this->assertIsString($company->getSocial()->getFacebook());
        }

        // Twitch
        if ($company->getSocial()->getTwitch() !== null) {
            $this->assertIsString($company->getSocial()->getTwitch());
        }

        // PlaysTV
        if ($company->getSocial()->getPlays() !== null) {
            $this->assertIsString($company->getSocial()->getPlays());
        }

        // Discord
        if ($company->getSocial()->getDiscord() !== null) {
            $this->assertIsString($company->getSocial()->getDiscord());
        }

        // YouTube
        if ($company->getSocial()->getYouTube() !== null) {
            $this->assertIsString($company->getSocial()->getYouTube());
        }

        $this->assertInstanceOf(Social::class, $company->getSocial());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasSupportedGames()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertInstanceOf(Game::class, $company->getGames());

        $this->assertIsBool($company->getGames()->isAts());
        $this->assertIsBool($company->getGames()->isEts());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasMemberCount()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsInt($company->getMembersCount());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasARecruitmentState()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getRecruitment());

        $this->assertIsBool($company->isRecruitmentClosed());
        $this->assertIsBool($company->isRecruitmentOpen());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasALanguage()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getLanguage());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testIfItsVerified()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsBool($company->isVerified());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasACreatedDate()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertInstanceOf(Carbon::class, $company->getCreatedDate());
    }
}
