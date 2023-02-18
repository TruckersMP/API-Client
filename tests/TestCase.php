<?php

namespace Tests;

use Carbon\Carbon;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use PHPUnit\Framework\TestCase as BaseTestCase;
use TruckersMP\APIClient\Client;

class TestCase extends BaseTestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * The current instance of the Client.
     *
     * @var Client
     */
    protected Client $client;

    /**
     * Create a new TestCase instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
    }

    /**
     * Assert that the given value is a Carbon date.
     *
     * @param  string  $expected
     * @param  Carbon  $actual
     * @param  string  $format
     * @return void
     */
    protected function assertDate(
        string $expected,
        Carbon $actual,
        string $format = 'Y-m-d H:i:s'
    ): void {
        $this->assertInstanceOf(Carbon::class, $actual);
        $this->assertSame($expected, $actual->format($format));
    }
}
