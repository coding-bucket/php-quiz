<?php

// Comparing arrays
// --
// What will be the output of the following PHP code?
// php
$integer_keys = [1 => 'alpha', 2 => 'beta'];
$string_keys = ['1' => 'alpha', '2' => 'beta'];

var_dump($integer_keys == $string_keys);
var_dump($integer_keys === $string_keys);

$integer_keys = ['alpha' => 1, 'beta' => 2];
$string_keys = ['alpha' => '1', 'beta' => '2'];

var_dump($integer_keys == $string_keys);
var_dump($integer_keys === $string_keys);
// --
// plain
// bool(true)
// bool(true)
// bool(true)
// bool(false)
// --
// Equality: <code>$a == $b</code> equals <code>true</code> iff $a and $b have the same key/value pairs (in loose comparison).
// Identity: <code>$a === $b</code> equals <code>true</code> iff $a and $b have the same key/value pairs of the same types (strict comparison) in the same order.
// --
// www.php.net/manual/en/language.operators.array.php
