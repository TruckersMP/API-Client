<?php

namespace Tests\Unit\Requests;

use Illuminate\Support\Collection;
use Tests\TestCase;
use Tests\Unit\MockAPIRequests;
use TruckersMP\APIClient\Models\Ban;

class BanRequestTest extends TestCase
{
    use MockAPIRequests;

    public function testItCanGetBans()
    {
        $this->mockRequest('ban.json', 'bans/1');

        $bans = $this->client->bans(1)->get();

        $this->assertInstanceOf(Collection::class, $bans);
        $this->assertCount(1, $bans);

        $this->assertInstanceOf(Ban::class, $bans->first());
    }
}
