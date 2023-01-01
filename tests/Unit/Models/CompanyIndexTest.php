<?php

namespace Tests\Unit\Models;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockModelData;
use TruckersMP\APIClient\Models\Company;
use TruckersMP\APIClient\Models\CompanyIndex;

class CompanyIndexTest extends TestCase
{
    use MockModelData;

    /**
     * A CompanyIndex instance with mocked data.
     *
     * @var CompanyIndex
     */
    private CompanyIndex $index;

    /**
     * This method is called before each test.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $data = $this->getFixtureData('company.index.json');

        $this->index = new CompanyIndex($this->client, $data);
    }

    public function testItHasRecentCompanies()
    {
        $recent = $this->index->getRecent();

        $this->assertInstanceOf(Collection::class, $recent);
        $this->assertCount(1, $recent);

        $this->assertInstanceOf(Company::class, $recent->first());
    }

    public function testItHasFeaturedCompanies()
    {
        $featured = $this->index->getFeatured();

        $this->assertInstanceOf(Collection::class, $featured);
        $this->assertCount(1, $featured);

        $this->assertInstanceOf(Company::class, $featured->first());
    }

    public function testItHasCoverFeaturedCompanies()
    {
        $companies = $this->index->getFeaturedCovered();

        $this->assertInstanceOf(Collection::class, $companies);
        $this->assertEmpty($companies);
    }
}
