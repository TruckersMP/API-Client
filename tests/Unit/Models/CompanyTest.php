<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\Company;
use TruckersMP\APIClient\Models\Game;
use TruckersMP\APIClient\Models\Social;

class CompanyTest extends TestCase
{
    use MockModelData;

    /**
     * A Company model instance with mocked data.
     *
     * @var Company
     */
    private Company $company;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('company.json');

        $this->company = new Company($this->client, $data);
    }

    public function testItHasAnId()
    {
        $this->assertSame(1, $this->company->getId());
    }

    public function testItHasAName()
    {
        $this->assertSame('TruckersMP Developers', $this->company->getName());
    }

    public function testItHasAnOwner()
    {
        $this->assertSame(1287455, $this->company->getOwnerId());
        $this->assertSame('Owner', $this->company->getOwnerName());
    }

    public function testItHasASlogan()
    {
        $this->assertSame('$company->create();', $this->company->getSlogan());
    }

    public function testItHasATag()
    {
        $this->assertSame('TMP-DEV', $this->company->getTag());
    }

    public function testItHasALogo()
    {
        $this->assertSame('https://static.truckersmp.com/images/vtc/logo/logo.png', $this->company->getLogo());
    }

    public function testItHasACover()
    {
        $this->assertSame('https://static.truckersmp.com/images/vtc/cover/cover.jpeg', $this->company->getCover());
    }

    public function testItHasInformation()
    {
        $this->assertSame('Information', $this->company->getInformation());
    }

    public function testItHasRules()
    {
        $this->assertSame('Rules', $this->company->getRules());
    }

    public function testItHasRequirements()
    {
        $this->assertSame('Requirements', $this->company->getRequirements());
    }

    public function testItHasAWebsite()
    {
        $this->assertSame('https://truckersmp.com', $this->company->getWebsite());
    }

    public function testItHasSocialMediaLinks()
    {
        $social = $this->company->getSocial();

        $this->assertInstanceOf(Social::class, $social);

        $this->assertSame('https://twitter.com/truckersmp', $social->getTwitter());
        $this->assertSame('https://www.facebook.com/truckersmpofficial/', $social->getFacebook());
        $this->assertSame('https://www.twitch.tv/truckersmp_official', $social->getTwitch());
        $this->assertSame('https://discord.gg/truckersmp', $social->getDiscord());
        $this->assertSame('https://www.youtube.com/c/TruckersMPOfficial/', $social->getYouTube());
    }

    public function testItHasGames()
    {
        $games = $this->company->getGames();

        $this->assertInstanceOf(Game::class, $games);

        $this->assertTrue($games->isAts());
        $this->assertTrue($games->isEts());
    }

    public function testItHasAMemberCount()
    {
        $this->assertSame(5, $this->company->getMembersCount());
    }

    public function testItHasARecruitmentStatus()
    {
        $this->assertSame('Close', $this->company->getRecruitment());

        $this->assertTrue($this->company->isRecruitmentClosed());
        $this->assertFalse($this->company->isRecruitmentOpen());
    }

    public function testItHasALanguage()
    {
        $this->assertSame('English', $this->company->getLanguage());
    }

    public function testItIsVerified()
    {
        $this->assertTrue($this->company->isVerified());
    }

    public function testItIsNotValidated()
    {
        $this->assertFalse($this->company->isValidated());
    }

    public function testItHasACreationDate()
    {
        $this->assertDate('2019-07-13 14:26:49', $this->company->getCreatedDate());
    }
}
