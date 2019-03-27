<?php

namespace TruckersMP\Models;

use TruckersMP\Exceptions\APIErrorException;
use Vent\VentTrait;

class ServersModel extends GroupedModel
{
    use VentTrait;

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
        // Make sure our grouped variable is kept updated
        $this->registerEvent('write', 'servers', function(){
            $this->groupedValue = $this->servers;
        });

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
