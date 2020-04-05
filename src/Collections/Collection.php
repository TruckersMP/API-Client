<?php

namespace TruckersMP\APIClient\Collections;

use ArrayAccess;
use Countable;
use Iterator;

class Collection implements ArrayAccess, Iterator, Countable
{
    /**
     * The items contained in the collection.
     *
     * @var array
     */
    protected $items = [];

    /**
     * The current position in the collection.
     *
     * @var int
     */
    protected $position;

    /**
     * Create a new Collection instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->position = 0;
    }

    /**
     * Determine if an item exists at an offset.
     *
     * @param  mixed  $key
     * @return bool
     */
    public function offsetExists($key): bool
    {
        return array_key_exists($key, $this->items);
    }

    /**
     * Get an item at a given offset.
     *
     * @param  mixed  $key
     * @return mixed
     */
    public function offsetGet($key)
    {
        return $this->items[$key];
    }

    /**
     * Set the item at a given offset.
     *
     * @param mixed $key
     * @param mixed $value
     *
     * @return void
     */
    public function offsetSet($key, $value): void
    {
        if (is_null($key)) {
            $this->items[] = $value;
        } else {
            $this->items[$key] = $value;
        }
    }

    /**
     * Unset the item at a given offset.
     *
     * @param  string  $key
     * @return void
     */
    public function offsetUnset($key): void
    {
        unset($this->items[$key]);
    }

    /**
     * Return the current element.
     *
     * @return mixed
     */
    public function current()
    {
        return $this->items[$this->position];
    }

    /**
     * Move forward to next element.
     *
     * @return void
     */
    public function next(): void
    {
        $this->position++;
    }

    /**
     * Return the key of the current element.
     *
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * Checks if current position is valid.
     *
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->items[$this->position]);
    }

    /**
     * Rewind the Iterator to the first element.
     *
     * @return void
     */
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * Count elements of an object.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }
}
