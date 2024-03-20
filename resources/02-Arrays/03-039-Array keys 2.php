<?php

// Array keys 2
// --
// What will be the output of the following PHP code?
// php
var_dump(['1' => 'a']);

var_dump(['01' => 'b']);

var_dump(['+1' => 'c']);

var_dump(['-1' => 'd']);

var_dump(['+0' => 'e']);

var_dump(['-0' => 'f']);

// --
// plain
// array(1) {
//     [1]=>
//   string(1) "a"
// }
// array(1) {
//     ["01"]=>
//   string(1) "b"
// }
// array(1) {
//     ["+1"]=>
//   string(1) "c"
// }
// array(1) {
//     [-1]=>
//   string(1) "d"
// }
// array(1) {
//     ["+0"]=>
//   string(1) "e"
// }
// array(1) {
//     ["-0"]=>
//   string(1) "f"
// }
