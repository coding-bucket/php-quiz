<?php

// Array destructuring
// --
// What will be the output of the following PHP code?
// php
$foo = ['uno', 'duo'];
[$a, $b] = $foo;
var_dump($a, $b);

$bar = [
    'a' => 'alpha',
    'b' => 'beta'
];
[$a, $b] = $bar;
var_dump($a, $b);
// --
// plain
// string(3) "uno"
// string(3) "duo"
// PHP Warning:  Undefined array key 0 in (...) on line 9
// PHP Warning:  Undefined array key 1 in (...) on line 9
// NULL
// NULL
// --
// --
// www.php.net/manual/en/function.list.php
// php.watch/versions/7.1/array-destructuring
// stitcher.io/blog/array-destructuring-with-list-in-php
