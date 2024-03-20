<?php

// Array keys 3
// --
// What will be the output of the following PHP code?
// php
var_dump([true => 'a']);

var_dump(['2.8' => 'b']);

var_dump([2.8 => 'c']);

var_dump([-2.8 => 'd']);

var_dump(['2' . '3' => 'e']);

var_dump(['2' + '3' => 'f']);

var_dump([null => 'g']);
// --
// plain
// array(1) {
//     [1]=>
//   string(1) "a"
// }
// array(1) {
//     ["2.8"]=>
//   string(1) "b"
// }
// Deprecated: Implicit conversion from float 2.8 to int loses precision in (...) on line 5
// array(1) {
//     [2]=>
//   string(1) "c"
// }
// Deprecated: Implicit conversion from float -2.8 to int loses precision in (...) on line 7
// array(1) {
//     [-2]=>
//   string(1) "d"
// }
// array(1) {
//     [23]=>
//   string(1) "e"
// }
// array(1) {
//     [5]=>
//   string(1) "f"
// }
// array(1) {
//  [""]=>
//  string(1) "g"
// }
