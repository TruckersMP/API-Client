<?php

namespace TruckersMP\Models;

use TruckersMP\Exceptions\APIErrorException;

class Servers implements \Iterator, \ArrayAccess
{
    /**
     * Array of servers.
     *
     * @var array
     */
    public $servers;

    /**
     * Iterator position.
     *
     * @var int
     */
    private $position = 0;

    /**
     * Servers constructor.
     *
     * @param array $response
     *
     * @throws APIErrorException
     */
    public function __construct(array $response)
    {
        $this->position = 0;

        if ($response['error'] == 'true' && $response['descriptor'] == 'Unable to fetch servers') {
            throw new APIErrorException($response['descriptor']);
        }

        foreach ($response['response'] as $k => $server) {
            $this->servers[$k] = new Server($server);
        }
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->servers[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->servers[$this->position]);
    }

    public function offsetSet($offset, $value)
    {
        // TODO: custom class that gives a better description of the error
        return new \Exception('Can not change servers');
    }

    public function offsetExists($offset)
    {
        return isset($this->servers[$offset]);
    }

    public function offsetUnset($offset)
    {
        // TODO: custom class that gives a better description of the error
        return new \Exception('Can not change servers');
    }

    public function offsetGet($offset)
    {
        return isset($this->servers[$offset]) ? $this->servers[$offset] : null;
    }
}
