<?php

namespace Tests\Unit\Requests;

use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\Version;

class VersionRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetVersion()
    {
        $this->mockRequest('version.json', 'version');

        $version = $this->client->version()->get();

        $this->assertInstanceOf(Version::class, $version);
    }
}
