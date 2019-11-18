<?php

namespace TruckersMP\Requests;

use TruckersMP\Models\Version;

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
     * @throws \Http\Client\Exception
     */
    public function get(): Version
    {
        return new Version(
            $this->call()
        );
    }
}
