<?php
namespace CentralApps\Collections;

class Collection implements \Countable, \IteratorAggregate
{
    protected $objects = array();

    public function add($object)
    {
        $this->objects[] = $object;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->objects);
    }

    public function count()
    {
        return count($this->objects);
    }

    public function pop()
    {
        return $this->objects[count($this->objects)-1];
    }
}
