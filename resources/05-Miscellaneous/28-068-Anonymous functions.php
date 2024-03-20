<?php

// Anonymous functions
// --
// What will be the output of the following PHP code?
// php
$name = 'Alice';
$greeting = function () use ($name): string {
    return 'Hello ' . $name . PHP_EOL;
};
$name = 'Bob';
echo $greeting();

$name = 'Alice';
$greeting = function () use (&$name): string {
    return 'Hello ' . $name . PHP_EOL;
};
$name = 'Bob';
echo $greeting();

// --
// plain
// Hello Alice
// Hello Bob
// --
// text
// The first function uses <em>by-value</em> binding:
// - It is not possible to modify the value in the outer scope.
// - The value of the inherited variable is from when the function is defined, not when called.
//
// The second function uses <em>by-reference</em> binding:
// - It is possible to modify the value of the bound variable in the outer scope.
// - The value of the inherited variable is from when the function is called.
// --
// www.php.net/manual/en/functions.anonymous.php

