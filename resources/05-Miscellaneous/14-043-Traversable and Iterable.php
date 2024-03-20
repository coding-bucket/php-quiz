<?php

// Traversable and Iterable
// --
// What will be the output of the following PHP code?
// php
$array = [0, 1];
$object = new stdClass();
$object->a = 2;
$object->b = 3;

var_dump($array instanceof Traversable);
var_dump($object instanceof Traversable);

var_dump($array instanceof Iterable);
var_dump($object instanceof Iterable);

var_dump(is_iterable($array));
var_dump(is_iterable($object));

foreach ($array as $key => $value) {
    echo $key, $value;
}
foreach ($object as $key => $value) {
    echo $key, $value;
}
// --
// plain
// bool(false)
// bool(false)
// bool(false)
// bool(false)
// bool(true)
// bool(false)
// 0011a2b3
// --
// <code>is_iterable()</code>: Verify that the contents of a variable is accepted by the <code>iterable</code> pseudo-type, i.e. that it is either an array or an object implementing <code>Traversable</code>.
// --
// www.php.net/manual/de/function.is-iterable.php
// stackoverflow.com/questions/46364048/why-are-objects-considered-not-iterable-although-they-actually-are
