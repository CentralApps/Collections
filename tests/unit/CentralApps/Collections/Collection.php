<?php
namespace CentralApps\Collections;

/**
 * These are *old* tests ported over for the moved component. They need improving. Big time.
 */
class CollectionTest extends \PHPUnit_Framework_TestCase
{
    protected $collection;

    public function setUp()
    {
        $this->collection = $this->getMock('\CentralApps\Collections\Collection');
    }

    public function testAdd()
    {
        $class = new \ReflectionClass("\CentralApps\Collections\Collection");
        $property = $class->getProperty('objects');
        $property->setAccessible(true);
        $value = $property->getValue($this->collection);
        $this->assertEquals(0, count($value), "The collection was not empty by default");
        $this->_object->add("test");
        $value = $property->getValue($this->collection);
        $this->assertEquals(1, count($value), "After adding to the collection, the count was not 1");
      }

    public function testCount()
    {
        $this->assertEquals(0, count($this->collection), "Empty collection not empty by default");
        $class = new \ReflectionClass("\CentralApps\Collections\Collection");
        $property = $class->getProperty('objects');
        $property->setAccessible(true);
        $property->setValue($this->collection, array(""));
        $this->assertEquals(1, count($this->collection), "Adding to the collection didn't increase the count");
    }

    public function testPop()
    {
        $class = new \ReflectionClass("\CentralApps\Collections\Collection");
        $property = $class->getProperty('objects');
        $property->setAccessible(true);
        $property->setValue($this->collection, array("a", "b"));
        $popped = $this->_object->pop();
        $this->assertTrue(($popped == "b"), "Popped value wasn't as expected");
    }

    public function testGetIterator()
    {
        $class = new \ReflectionClass("\CentralApps\Collections\Collection");
        $property = $class->getProperty('objects');
        $property->setAccessible(true);
        $property->setValue($this->collections, array("a", "b"));
        $foundA = false;
        $foundB = false;
        foreach ($this->collections as $item) {
            if ($item == 'a') {
                $foundA = true;
            } elseif ($item == 'b') {
                $foundB = true;
            }
        }

        $this->assertTrue(($foundA && $foundB), "Didn't iterate and find A and B");
    }
}
