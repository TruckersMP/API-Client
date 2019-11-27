<?php

namespace TruckersMP;

use Exception;
use Psr\Http\Message\StreamInterface;
use TruckersMP\Exceptions\PageNotFoundException;
use TruckersMP\Exceptions\RequestException;

class ApiErrorHandler
{
    /**
     * Check if the API returned an error.
     *
     * @param \Psr\Http\Message\StreamInterface $body
     * @param int                               $statusCode
     *
     * @return \Exception
     *
     * @throws \TruckersMP\Exceptions\PageNotFoundException
     * @throws \TruckersMP\Exceptions\RequestException
     */
    public static function check(StreamInterface $body, int $statusCode): ?Exception
    {
        $statusCodeType = (int) ($statusCode / 100);

        if ($statusCodeType === 2) {
            return null;
        }

        $body = json_decode((string) $body, true, 512, JSON_BIGINT_AS_STRING);

        // If it's a page not found error, through a PageNotFoundException
        if (array_key_exists('descriptor', $body)) {
            throw new PageNotFoundException($body['descriptor']);
        }

        // Otherwise throw a RequestException
        throw new RequestException($body['response']);
    }
}
