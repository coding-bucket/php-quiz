<?php

// Null coalescing operator
// --
// What will be the output of the following PHP code?
// php
var_dump(null ?? 'a');
var_dump(['x' => 3]['y'] ?? 'b');
var_dump($x ?? 'c');
var_dump(false ?? 'd');
var_dump([] ?? 'e');
var_dump('' ?? 'f');
var_dump(0 ?? 'g');
var_dump('0' ?? 'h');
// --
// plain
// string(1) "a"
// string(1) "b"
// string(1) "c"
// bool(false)
// array(0) {}
// string(0) ""
// int(0)
// string(1) "0"
// --
// The null coalescing operator
// php
$x ?? $y
// text
// evaluates to
// plain
// $x if and only if $x exists and $x !== null
// $y otherwise.
// text
// It is equivalent to:
// php
isset($x) ? $x : $y
// --
// www.php.net/manual/en/migration70.new-features.php




