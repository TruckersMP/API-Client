<?php

namespace TruckersMP\Models;

use TruckersMP\Exceptions\APIErrorException;

class ServersModel extends GroupedModel
{
    /**
     * Array of servers.
     *
     * @var array
     */
    public $servers = [];

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
            $this->servers[$k] = new ServerModel($server);
        }

        $this->groupedValue = $this->servers;
    }
}
