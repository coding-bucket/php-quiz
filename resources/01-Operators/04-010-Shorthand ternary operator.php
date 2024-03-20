<?php

// Shorthand ternary operator (also called "Elvis operator")
// --
// What will be the output of the following PHP code?
// php
var_dump(null ?: 'a');
var_dump(['x' => 3]['y'] ?: 'b');
var_dump($x ?: 'c');
var_dump(false ?: 'd');
var_dump([] ?: 'e');
var_dump('' ?: 'f');
var_dump(0 ?: 'g');
var_dump('0' ?: 'h');

// --
// plain
// string(1) "a"
// string(1) "b" PHP Warning:  Undefined array key "y"
// string(1) "c" PHP Warning:  Undefined variable $x
// string(1) "d"
// string(1) "e"
// string(1) "f"
// string(1) "g"
// string(1) "h"
// --
// The ternary operator shorthand
// php
$x ?: $y
// text
// is shorthand for
// php
$x ? $x : $y
// text
// which is equivalent to
// php
!empty($x) ? $x : $y;
// text
// which is equivalent to
// php
isset($x) && $x != false ? $x : $y
// text
// Note the weak comparison in the last line.
