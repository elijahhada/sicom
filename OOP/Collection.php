<?php


class Collection
{
    public $storage = [];

    function __construct()
    {

    }

    /**
     * @param object $key
     * @param mixed|null $data
     */
    public function add(object $key, mixed $data = null): void
    {
        $this->storage[base64_encode(serialize($key))] = $data;
    }

    /**
     * @param object $key
     */
    public function remove(object $key): void
    {
        unset($this->storage[base64_encode(serialize($key))]);
    }

    /**
     * @param object $object
     * @return string
     */
    public function getHash(object $object): string
    {
        return base64_encode($object);
    }

    /**
     * @return object
     */
    public function current(): object
    {
        return unserialize(base64_decode(array_key_last($this->storage)));
    }

    /**
     * @return array
     */
    public function getObjectList(): array
    {
        return $this->storage;
    }

    /**
     * @param object $object
     * @return bool
     */
    public function check(object $object): bool
    {
        return isset($this->storage[base64_encode(serialize($object))]);
    }

    /**
     * @param Collection $collection
     */
    public static function removeAll(Collection $collection): void
    {
        $collection->storage = [];
    }
}

class Example
{
    public $data;

    public function __construct(mixed $data = 'default')
    {
        $this->date = $data;
    }

    public function __toString()
    {
        return spl_object_id($this);
    }
}

$exampleObj1 = new Example();
$exampleObj2 = new Example('John');
$exampleObj3 = new Example('Sam');
$collection = new Collection();
$collection->add($exampleObj1, 'Awesome1');
$collection->add($exampleObj2, 'Awesome2');
$collection->add($exampleObj3, 'Awesome3');
var_dump($collection->storage);
$collection->remove($exampleObj3);
var_dump($collection->storage);
var_dump($collection->getHash($exampleObj1));
var_dump($collection->current());
var_dump($collection->getObjectList());
var_dump($collection->check($exampleObj1));
var_dump($collection->check($exampleObj3));
Collection::removeAll($collection);
var_dump($collection->storage);

?>