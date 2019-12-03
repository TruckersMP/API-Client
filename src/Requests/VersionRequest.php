<?php

namespace TruckersMP\APIClient\Requests;

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
     * @throws \Http\Client\Exception
     * @throws \TruckersMP\APIClient\Exceptions\PageNotFoundException
     * @throws \TruckersMP\APIClient\Exceptions\RequestException
     * @throws \Exception
     */
    public function get(): Version
    {
        return new Version(
            $this->send()
        );
    }
}
