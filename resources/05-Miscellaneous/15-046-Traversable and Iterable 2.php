<?php

// Traversable and Iterable 2
// --
// What will be the output of the following PHP code?
// php
class T implements Traversable
{
    public int $a = 1;
    public int $b = 2;
}

$object = new T();

foreach ($object as $key => $value) {
    echo $key, $value;
}
// --
// plain
// PHP Fatal error:  Class T must implement interface Traversable as part of either Iterator or IteratorAggregate
