<?php

namespace Tests\Unit;

use GuzzleHttp\Client as GuzzleClient;
use Mockery;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

trait MockAPIRequests
{
    /**
     * Mock request data.
     *
     * @param  string  $file
     * @param  string  $uri
     * @param  string  $method
     * @param  int  $status
     * @return void
     */
    protected function mockRequest(
        string $file,
        string $uri,
        string $method = 'GET',
        int $status = 200
    ): void {
        if (!property_exists($this, 'client')) {
            return;
        }

        $contents = file_get_contents(__DIR__ . '/Requests/fixtures/' . $file);
        $data = json_decode($contents, true, 512, JSON_BIGINT_AS_STRING);

        $stream = Mockery::mock(StreamInterface::class);
        $stream->expects('__toString')->andReturn($contents);

        $response = Mockery::mock(ResponseInterface::class);
        $response->expects('getBody')->andReturn($stream);

        if (($data['error'] ?? false) && $data['error'] !== 'false') {
            // The status code is used only when an error occurs
            $response->expects('getStatusCode')->andReturn($status);
        }

        $httpClient = Mockery::mock(GuzzleClient::class);

        $httpClient
            ->expects('send')
            ->andReturn($response)
            ->withArgs(function (RequestInterface $request) use ($method, $uri) {
                // Assert the value instead of setting up an expectation to get clear errors
                self::assertSame($uri, $request->getRequestTarget());
                self::assertSame($method, $request->getMethod());

                return true;
            });

        $this->client->setHttpClient($httpClient);
    }
}
