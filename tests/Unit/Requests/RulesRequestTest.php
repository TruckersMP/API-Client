<?php

namespace Tests\Unit\Requests;

use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\Rule;

class RulesRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetRules()
    {
        $this->mockRequest('rules.json', 'rules');

        $rules = $this->client->rules()->get();

        $this->assertInstanceOf(Rule::class, $rules);
    }
}
