<?php

namespace TruckersMP\Models;

use TruckersMP\Exceptions\APIErrorException;

class ServersModel extends GroupedModel
{
    /**
     * @var string
     */
    protected $exceptionMessage = 'You do not have access to modify the servers.';

    /**
     * ServersModel constructor.
     *
     * @param array $response
     * @throws APIErrorException
     */
    public function __construct(array $response)
    {
        $this->position = 0;

        if ($response['error'] == 'true' && $response['descriptor'] == 'Unable to fetch servers') {
            throw new APIErrorException($response['descriptor']);
        }

        foreach ($response['response'] as $k => $server) {
            $this->groupedValue[$k] = new ServerModel($server);
        }
    }

    /**
     * @return array
     */
    public function getServers(): array
    {
        return $this->groupedValue;
    }
}
