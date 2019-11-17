<?php

namespace Tests;

use PHPUnit\Framework\TestCase as BaseTestCase;
use TruckersMP\Client;

class TestCase extends BaseTestCase
{
    /**
     * @var \TruckersMP\Client
     */
    protected $client;

    /**
     * Create a new TestCase instance.
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
    }
}
