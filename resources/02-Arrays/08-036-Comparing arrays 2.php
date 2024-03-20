<?php

// Comparing arrays 2
// --
// What will be the output of the following PHP code?
// php
$array = [1 => 'alpha', 2 => 'beta'];

$array_shuffled = [2 => 'beta', 1 => 'alpha'];
var_dump($array == $array_shuffled);
var_dump($array === $array_shuffled);

$array_with_other_keys = [2 => 'alpha', 3 => 'beta'];
var_dump($array == $array_with_other_keys);
var_dump($array === $array_with_other_keys);
// --
// plain
// bool(true)
// bool(false)
// bool(false)
// bool(false)
// --
// Equality: <code>$a == $b</code> equals <code>true</code> iff $a and $b have the same key/value pairs (in loose comparison).
// Identity: <code>$a === $b</code> equals <code>true</code> iff $a and $b have the same key/value pairs of the same types (strict comparison) in the same order.
// --
// www.php.net/manual/en/language.operators.array.php
