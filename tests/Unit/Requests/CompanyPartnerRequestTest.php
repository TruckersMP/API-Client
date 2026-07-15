<?php

namespace Tests\Unit\Requests;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\CompanyPartnership;
use TruckersMP\APIClient\Models\CompanyPartnershipIndex;

class CompanyPartnerRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetAllCompanyPartners()
    {
        $this->mockRequest('company.partner.index.json', 'vtc/1/partners');

        $index = $this->client->company(1)->partners()->get();

        $this->assertInstanceOf(CompanyPartnershipIndex::class, $index);
        $this->assertSame(1, $index->getPendingRequestsCount());

        $partners = $index->getPartners();

        $this->assertInstanceOf(Collection::class, $partners);
        $this->assertCount(1, $partners);

        $partnership = $partners->first();

        $this->assertInstanceOf(CompanyPartnership::class, $partnership);
        $this->assertSame(1, $partnership->getSender()->getId());
        $this->assertSame(22, $partnership->getReceiver()->getId());
    }
}
