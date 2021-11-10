<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use TruckersMP\APIClient\Collections\CompanyCollection;
use TruckersMP\APIClient\Models\Company;
use TruckersMP\APIClient\Models\CompanyIndex;
use TruckersMP\APIClient\Models\Game;
use TruckersMP\APIClient\Models\Social;

class CompanyTest extends TestCase
{
    /**
     * The ID of the company to use in the tests.
     */
    private const TEST_COMPANY_ID = 1;

    private const TEST_COMPANY_SLUG = 'phoenix';

    /** @test */
    public function it_can_get_all_the_companies()
    {
        $companies = $this->companies();

        $this->assertInstanceOf(CompanyIndex::class, $companies);
    }

    /** @test */
    public function it_can_get_the_recent_companies()
    {
        $companies = $this->companies()->getRecent();

        $this->assertNotEmpty($companies);

        $this->assertInstanceOf(CompanyCollection::class, $companies);
    }

    /** @test */
    public function it_can_get_the_featured_companies()
    {
        $companies = $this->companies()->getFeatured();

        $this->assertNotEmpty($companies);

        $this->assertInstanceOf(CompanyCollection::class, $companies);
    }

    /** @test */
    public function it_can_get_the_featured_cover_companies()
    {
        $companies = $this->companies()->getFeaturedCovered();

        $this->assertNotEmpty($companies);

        $this->assertInstanceOf(CompanyCollection::class, $companies);
    }

    /** @test */
    public function it_can_get_a_specific_company_with_id()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertInstanceOf(Company::class, $company);
    }

    /** @test */
    public function it_can_get_a_specific_company_with_slug()
    {
        $company = $this->company(self::TEST_COMPANY_SLUG);

        $this->assertInstanceOf(Company::class, $company);
    }

    /** @test */
    public function it_has_an_id()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsInt($company->getId());
    }

    /** @test */
    public function it_has_a_name()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsString($company->getName());
    }

    /** @test */
    public function it_has_an_owner_id()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsInt($company->getOwnerId());
    }

    /** @test */
    public function it_has_an_owner_name()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsString($company->getOwnerName());
    }

    /** @test */
    public function it_has_a_slogan()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsString($company->getSlogan());
    }

    /** @test */
    public function it_has_a_tag()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsString($company->getTag());
    }

    /** @test */
    public function it_has_a_cover()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsString($company->getCover());
    }

    /** @test */
    public function it_has_a_logo()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsString($company->getLogo());
    }

    /** @test */
    public function it_has_information()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsString($company->getInformation());
    }

    /** @test */
    public function it_has_rules()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsString($company->getRules());
    }

    /** @test */
    public function it_has_requirements()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsString($company->getRequirements());
    }

    /** @test */
    public function it_has_a_website()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsString($company->getWebsite());
    }

    /** @test */
    public function it_has_social_media_information()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

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

    /** @test */
    public function it_has_supported_games()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertInstanceOf(Game::class, $company->getGames());

        $this->assertIsBool($company->getGames()->isAts());
        $this->assertIsBool($company->getGames()->isEts());
    }

    /** @test */
    public function it_has_a_member_count()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsInt($company->getMembersCount());
    }

    /** @test */
    public function it_has_a_recruitment_state()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsString($company->getRecruitment());

        $this->assertIsBool($company->isRecruitmentClosed());
        $this->assertIsBool($company->isRecruitmentOpen());
    }

    /** @test */
    public function it_has_a_language()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsString($company->getLanguage());
    }

    /** @test */
    public function if_it_is_verified()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsBool($company->isVerified());
    }

    /** @test */
    public function if_it_is_validate()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertIsBool($company->isValidated());
    }

    /** @test */
    public function it_has_a_created_at_test()
    {
        $company = $this->company(self::TEST_COMPANY_ID);

        $this->assertInstanceOf(Carbon::class, $company->getCreatedDate());
    }
}
