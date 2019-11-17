<?php

namespace TruckersMP\Collections;

use ArrayAccess;
use Exception;
use Iterator;
use TruckersMP\Exceptions\IndexNotFoundException;

class Collection implements Iterator, ArrayAccess
{
    /**
     * The current position.
     *
     * @var int
     */
    protected $position;

    /**
     * The collection.
     *
     * @var array
     */
    protected $collection = [];

    /**
     * The exception message to for unauthorised methods.
     *
     * @var string
     */
    protected $exceptionMessage = 'You do not have access to modify this grouped value.';

    /**
     * Get the collection value.
     *
     * @param  int|null  $index
     * @return array
     * @throws \TruckersMP\Exceptions\IndexNotFoundException
     */
    public function getValue(int $index = null): array
    {
        if ($index != null) {
            if (! isset($this->collection[$index])) {
                throw new IndexNotFoundException();
            }

            return $this->collection[$index];
        }

        return $this->collection;
    }

    /**
     * Return the current element.
     *
     * @return mixed
     */
    public function current()
    {
        return $this->collection[$this->position];
    }

    /**
     * Move forward to next element.
     *
     * @return void
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * Return the key of the current element.
     *
     * @return mixed
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Checks if current position is valid.
     *
     * @return bool
     */
    public function valid()
    {
        return isset($this->collection[$this->position]);
    }

    /**
     * Rewind the Iterator to the first element.
     *
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Whether a offset exists.
     *
     * @param  mixed  $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->collection[$offset]);
    }


    /**
     * Offset to retrieve.
     *
     * @param  mixed  $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return isset($this->collection[$offset]) ?: null;
    }

    /**
     * Offset to set.
     *
     * @param  mixed  $offset
     * @param  mixed  $value
     * @return \Exception|void
     */
    public function offsetSet($offset, $value)
    {
        return new Exception($this->exceptionMessage);
    }

    /**
     * Offset to unset.
     *
     * @param  mixed  $offset
     * @return \Exception|void
     */
    public function offsetUnset($offset)
    {
        return new Exception($this->exceptionMessage);
    }
}
