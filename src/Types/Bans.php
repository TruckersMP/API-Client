<?php


namespace TruckersMP\Types;

use Psr\Http\Message\ResponseInterface;
use TruckersMP\Exceptions\PlayerNotFoundException;

class Bans implements \Iterator
{

    /**
     * Iterator position
     * @var int
     */
    private $position = 0;

    /**
     * Array of bans
     * @var array
     */
    public $bans;

    /**
     * Bans constructor.
     * @param ResponseInterface $response
     * @throws PlayerNotFoundException
     */
    public function __construct(ResponseInterface $response)
    {
        $this->position = 0;

        $json = json_decode((string)$response->getBody(), true, 512, JSON_BIGINT_AS_STRING);

        if ($json['error'] &&
            ($json['descriptor'] == 'No player ID submitted' ||
                $json['descriptor'] == 'Invalid user ID')) {
            throw new PlayerNotFoundException($json['response']);
        }

        foreach ($json['response'] as $k => $ban) {
            $this->bans[$k] = new Ban($ban);
        }
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->bans[$this->position];
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
        return isset($this->bans[$this->position]);
    }
}
