<?php

namespace Tests\Unit\Requests;

use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\Company;
use TruckersMP\APIClient\Models\CompanyIndex;

class CompanyRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetTheCompanyIndex()
    {
        $this->mockRequest('company.index.json', 'vtc');

        $index = $this->client->companies()->get();

        $this->assertInstanceOf(CompanyIndex::class, $index);
    }

    public function testItCanGetASpecificCompany()
    {
        $this->mockRequest('company.json', 'vtc/1');

        $company = $this->client->company(1)->get();

        $this->assertInstanceOf(Company::class, $company);
    }
}
