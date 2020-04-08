<?php

namespace TruckersMP\APIClient\Requests;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\PageNotFoundException;
use TruckersMP\APIClient\Exceptions\RequestException;
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
     * @throws PageNotFoundException
     * @throws RequestException
     * @throws Exception
     * @throws ClientExceptionInterface
     */
    public function get(): Version
    {
        return new Version(
            $this->send()
        );
    }
}
