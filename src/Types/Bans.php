<?php


namespace TruckersMP\Types;

use Psr\Http\Message\ResponseInterface;
use TruckersMP\Exceptions\PlayerNotFoundException;

class Bans implements \Iterator, \ArrayAccess
{

    /**
     * Array of bans
     *
     * @var array
     */
    public $bans;
    /**
     * Iterator position
     *
     * @var int
     */
    private $position = 0;

    /**
     * Bans constructor.
     *
     * @param ResponseInterface $response
     *
     * @throws PlayerNotFoundException
     */
    public function __construct(ResponseInterface $response)
    {
        $this->position = 0;

        $json = json_decode((string)$response->getBody(), true, 512, JSON_BIGINT_AS_STRING);

        if ($json['error'] &&
            ($json['descriptor'] == 'No player ID submitted' ||
                $json['descriptor'] == 'Invalid user ID')
        ) {
            throw new PlayerNotFoundException($json['descriptor']);
        }

        foreach ($json['response'] as $k => $ban) {
            $this->bans[$k] = new Ban($ban);
        }
    }

    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->bans[$this->position];
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->bans[$this->position]);
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     *
     * @return \Exception
     */
    public function offsetSet($offset, $value)
    {
        // TODO: custom class that gives a better description of the error
        return new \Exception('Can not change bans');
    }

    /**
     * @param mixed $offset
     *
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->bans[$offset]);
    }

    /**
     * @param mixed $offset
     *
     * @return \Exception
     */
    public function offsetUnset($offset)
    {
        // TODO: custom class that gives a better description of the error
        return new \Exception('Can not change bans');
    }

    /**
     * @param mixed $offset
     *
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return isset($this->bans[$offset]) ? $this->bans[$offset] : null;
    }
}
