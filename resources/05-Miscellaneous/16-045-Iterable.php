<?php

// Iterable
// --
// Is the following code valid? What will be the output?
// php
function output(iterable $it) : void
{
    foreach ($it as $value) {
        echo $value;
    }
}

function generator(iterable $array) : Generator
{
    yield from $array;
}

output(['a', 'b', 'c']);
output(generator(['a', 'b', 'c']));

$object = new stdClass();
$object->a = 2;
$object->b = 3;
output($object);
// --
// plain
// abcabc
// Fatal error: Uncaught TypeError: output(): Argument #1 ($it) must be of type Traversable|array, stdClass given (...) on line 19
// --

// <code>Iterable</code> is a built-in compile time type alias for <code>array|Traversable</code>.
// Prior to PHP 8.2 it was a <em>pseudo-type</em>.
// The <code>Traversable</code> interface shows if a class is traversable using <code>foreach</code> and can be used with <code>yield from</code> within a generator.
// It cannot be implemented alone. Instead, it must be implemented by either <code>IteratorAggregate</code> or <code>Iterator</code>.
// --
// www.php.net/manual/de/language.types.iterable.php#language.types.iterable
