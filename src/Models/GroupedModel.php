<?php

namespace TruckersMP\Models;

class GroupedModel implements \Iterator, \ArrayAccess
{
    /**
     * @var int
     */
    protected $position = 0;

    /**
     * @var array
     */
    protected $groupedValue = [];

    /**
     * @var string
     */
    protected $exceptionMessage = 'You do not have access to modify this grouped value.';

    /**
     * @return void
     */
    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->groupedValue[$this->position];
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @return void
     */
    public function next(): void
    {
        $this->position++;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->groupedValue[$this->position]);
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     * @return \Exception
     */
    public function offsetSet($offset, $value): \Exception
    {
        return new \Exception($this->exceptionMessage);
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset): bool
    {
        return isset($this->groupedValue[$offset]);
    }

    /**
     * @param mixed $offset
     * @return \Exception
     */
    public function offsetUnset($offset): \Exception
    {
        return new \Exception($this->exceptionMessage);
    }

    /**
     * @param mixed $offset
     * @return bool|null
     */
    public function offsetGet($offset): ?bool
    {
        return isset($this->groupedValue[$offset]) ? $this->groupedValue[$offset] : null;
    }
}
