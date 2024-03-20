<?php

// Array Unpacking vs. <code>+</code> operator vs. <code>array_merge()</code>
// --
// What will be the output of the following PHP code?
// php
var_dump(['a' => 'foo'] + ['a' => 'bar']);

var_dump([...['a' => 'foo'], ...['a' => 'bar']]); // since PHP 8.1

var_dump(array_merge(['a' => 'foo'], ['a' => 'bar']));
// --
// plain
// array(1) {
//     ["a"]=>
//   string(3) "foo"
// }
// array(1) {
//     ["a"]=>
//   string(3) "bar"
// }
// array(1) {
//     ["a"]=>
//   string(3) "bar"
// --
// --
// php.watch/versions/8.1/spread-operator-string-array-keys
