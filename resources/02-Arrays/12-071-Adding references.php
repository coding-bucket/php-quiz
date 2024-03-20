<?php

// Adding references
// --
// What will be the output of the following PHP code?
// php
$a = [];
$a[] = "a";
$a[] = "b";

print_r($a);

$r =& $a[];

print_r($a);

$r = "c";

print_r($a);
// --
// plain
// Array
// (
//    [0] => a
//    [1] => b
// )
// Array
// (
//    [0] => a
//    [1] => b
//    [2] =>
// )
// Array
// (
//    [0] => a
//    [1] => b
//    [2] => c
// )
// --
// --
// stackoverflow.com/questions/3908576/what-does-mean-when-reading-from-a-php-array
