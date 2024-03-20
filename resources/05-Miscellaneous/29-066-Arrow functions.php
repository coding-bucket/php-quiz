<?php

// Arrow functions
// --
// What will be the output of the following PHP code?

// php
$name = 'Alice';
$greeting = fn(): string => 'Hello ' . $name;
$name = 'Bob';
echo $greeting();
// --
// plain
// Hello Alice
// --
// text
// <blockquote>Arrow functions support the same features as anonymous functions, except that using variables from the parent scope is always automatic. When a variable used in the expression is defined in the parent scope it will be implicitly captured <em>by-value</em>.</blockquote>
// --
// www.php.net/manual/en/functions.arrow.php



