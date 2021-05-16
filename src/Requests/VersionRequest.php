<?php

namespace TruckersMP\APIClient\Requests;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\Version;

class VersionRequest extends Request
{
    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'version';
    }

    /**
     * Get the data for the request.
     *
     * @return Version
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): Version
    {
        return new Version(
            $this->send()
        );
    }
}
