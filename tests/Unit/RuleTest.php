<?php

namespace Tests\Unit;

use Phpfastcache\Exceptions\PhpfastcacheInvalidArgumentException;
use Psr\Http\Client\ClientExceptionInterface;
use Tests\TestCase;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
use TruckersMP\APIClient\Models\Rule;

class RuleTest extends TestCase
{
    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testWeCanGetTheRules()
    {
        $rules = $this->rules();

        $this->assertInstanceOf(Rule::class, $rules);
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasTheRules()
    {
        $rules = $this->rules();

        $this->assertIsString($rules->getRules());
    }

    /**
     * @throws PhpfastcacheInvalidArgumentException
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws ClientExceptionInterface
     */
    public function testItHasTheRevision()
    {
        $rules = $this->rules();

        $this->assertIsInt($rules->getRevision());
    }
}
