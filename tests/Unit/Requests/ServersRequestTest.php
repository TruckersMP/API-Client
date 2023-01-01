<?php

namespace Tests\Unit\Requests;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\Server;

class ServersRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetAllServers()
    {
        $this->mockRequest('servers.json', 'servers');

        $servers = $this->client->servers()->get();

        $this->assertInstanceOf(Collection::class, $servers);
        $this->assertCount(1, $servers);

        $this->assertInstanceOf(Server::class, $servers->first());
    }
}
