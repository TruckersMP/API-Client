<?php

namespace TruckersMP\Tests\tests;

use PHPUnit\Framework\TestCase;
use TruckersMP\Client;
use TruckersMP\Models\RulesModel;

class RulesTest extends TestCase
{
    /**
     * @var \TruckersMP\Client
     */
    protected $client;

    /**
     * RulesTest constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
    }

    /**
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\Exceptions\APIErrorException
     */
    public function testWeCanGetTheRules()
    {
        $rules = $this->client->rules();

        $this->assertIsString($rules->getRules());
        $this->assertIsInt($rules->getRevision());

        $this->assertInstanceOf(RulesModel::class, $rules);
    }
}
