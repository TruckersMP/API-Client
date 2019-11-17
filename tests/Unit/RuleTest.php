<?php

namespace Tests\Unit;

use Tests\TestCase;
use TruckersMP\Models\Rule;

class RuleTest extends TestCase
{
    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\APIErrorException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testWeCanGetTheRules()
    {
        $rules = $this->rules();

        $this->assertInstanceOf(Rule::class, $rules);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\APIErrorException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasTheRules()
    {
        $rules = $this->rules();

        $this->assertIsString($rules->getRules());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\APIErrorException
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     */
    public function testItHasTheRevision()
    {
        $rules = $this->rules();

        $this->assertIsInt($rules->getRevision());
    }
}
