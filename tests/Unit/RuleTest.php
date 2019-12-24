<?php

namespace Tests\Unit;

use Tests\TestCase;
use TruckersMP\APIClient\Models\Rule;

class RuleTest extends TestCase
{
    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     */
    public function testWeCanGetTheRules()
    {
        $rules = $this->rules();

        $this->assertInstanceOf(Rule::class, $rules);
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     */
    public function testItHasTheRules()
    {
        $rules = $this->rules();

        $this->assertIsString($rules->getRules());
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     */
    public function testItHasTheRevision()
    {
        $rules = $this->rules();

        $this->assertIsInt($rules->getRevision());
    }
}
