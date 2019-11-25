<?php

namespace Tests\Unit;

use Tests\TestCase;
use TruckersMP\Models\Rule;

class RuleTest extends TestCase
{
    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testWeCanGetTheRules()
    {
        $rules = $this->rules();

        $this->assertInstanceOf(Rule::class, $rules);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasTheRules()
    {
        $rules = $this->rules();

        $this->assertIsString($rules->getRules());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public function testItHasTheRevision()
    {
        $rules = $this->rules();

        $this->assertIsInt($rules->getRevision());
    }
}
