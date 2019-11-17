<?php

namespace Tests\Unit;

use Tests\TestCase;
use TruckersMP\Models\Rule;

class RuleTest extends TestCase
{
    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\APIErrorException
     */
    public function testWeCanGetTheRules()
    {
        $rules = $this->client->rules();

        $this->assertInstanceOf(Rule::class, $rules);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\APIErrorException
     */
    public function testItHasTheRules()
    {
        $rules = $this->client->rules();

        $this->assertIsString($rules->getRules());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\APIErrorException
     */
    public function testItHasTheRevision()
    {
        $rules = $this->client->rules();

        $this->assertIsInt($rules->getRevision());
    }
}
