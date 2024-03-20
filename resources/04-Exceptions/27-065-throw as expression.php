<?php

// What will be the output of the following PHP code?
// --
// php
$value = 3;
$newValue = null;
try{
    $value = $newValue ?? throw new Exception('new value must be set');
} catch(Exception $e) {
}
var_dump($value);
// --
// plain
// int(3)
// --
// text
// From <a href="https://php.watch/versions/8.0/throw-expressions">php.watch/versions/8.0/throw-expressions</a>:
// <blockquote cite="https://php.watch/versions/8.0/throw-expressions">Prior to PHP 8.0, it was not allowed to throw an exception in when a single expression is expected.
// It is now possible to throw an exception in arrow functions, ternary expressions, or anywhere else the PHP parser expects a single expression.
// </blockquote>
// Note that in the example above, the value of <code>$value</code> is not changed.
// --
// php.watch/versions/8.0/throw-expressions
