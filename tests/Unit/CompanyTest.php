<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Tests\TestCase;
use TruckersMP\APIClient\Collections\CompanyCollection;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
use TruckersMP\APIClient\Models\Company;
use TruckersMP\APIClient\Models\CompanyIndex;
use TruckersMP\APIClient\Models\Game;
use TruckersMP\APIClient\Models\Social;

class CompanyTest extends TestCase
{
    /**
     * The ID of the company to use in the tests.
     */
    private const TEST_COMPANY = 1;

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetTheCompanies()
    {
        $companies = $this->companies();

        $this->assertInstanceOf(CompanyIndex::class, $companies);
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetTheRecentCompanies()
    {
        $companies = $this->companies()->getRecent();

        $this->assertNotEmpty($companies);

        $this->assertInstanceOf(CompanyCollection::class, $companies);
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetTheFeaturedCompanies()
    {
        $companies = $this->companies()->getFeatured();

        $this->assertNotEmpty($companies);

        $this->assertInstanceOf(CompanyCollection::class, $companies);
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetTheFeaturedCoverCompanies()
    {
        $companies = $this->companies()->getFeaturedCovered();

        $this->assertNotEmpty($companies);

        $this->assertInstanceOf(CompanyCollection::class, $companies);
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetACompany()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertInstanceOf(Company::class, $company);
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnId()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsInt($company->getId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAName()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getName());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnOwnerId()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsInt($company->getOwnerId());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAnOwnerName()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getOwnerName());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasASlogan()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getSlogan());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasATag()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getTag());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasALogo()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getLogo());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasACover()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getCover());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasInformation()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getInformation());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasRules()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getRules());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasRequirements()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getRequirements());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasAWebsite()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getWebsite());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
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

        // Discord
        if ($company->getSocial()->getDiscord() !== null) {
            $this->assertIsString($company->getSocial()->getDiscord());
        }

        // YouTube
        if ($company->getSocial()->getYouTube() !== null) {
            $this->assertIsString($company->getSocial()->getYouTube());
        }
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasSupportedGames()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertInstanceOf(Game::class, $company->getGames());

        $this->assertIsBool($company->getGames()->isAts());
        $this->assertIsBool($company->getGames()->isEts());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasMemberCount()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsInt($company->getMembersCount());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasARecruitmentState()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getRecruitment());

        $this->assertIsBool($company->isRecruitmentClosed());
        $this->assertIsBool($company->isRecruitmentOpen());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasALanguage()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsString($company->getLanguage());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testIfItsVerified()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsBool($company->isVerified());
    }

    /**
     * @throws ClientExceptionInterface
     * @throws PageNotFoundException
     * @throws PhpfastcacheInvalidArgumentException
     * @throws RequestException
     */
    public function testIfItsValidated()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertIsBool($company->isValidated());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasACreatedDate()
    {
        $company = $this->company(self::TEST_COMPANY);

        $this->assertInstanceOf(Carbon::class, $company->getCreatedDate());
    }
}
