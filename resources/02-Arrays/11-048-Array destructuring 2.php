<?php

// Array destructuring 2
// --
// What will be the output of the following PHP code?
// php
$greek = [
    null,
    'c' => 'gamma',
    'b' => 'beta',
    'a' => 'alpha',
];

['a' => $a, 'b' => $b, 'c' => $c] = $greek;
var_dump($a, $b, $c);
// --
// plain
// string(5) "alpha"
// string(4) "beta"
// string(5) "gamma"
