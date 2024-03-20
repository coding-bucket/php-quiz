<?php

// <code>foreach</code> statement
// --
// What will be the output of the following PHP code?
// php
$array = [1 => 'a', 2 => 'b', 4 => 'c', 8 => 'd'];
foreach ($array as $key => $value) {
    if ($key === 1) {
        $array[8] = 'x';
        unset($array[4]);
    }
    echo "$key => $value" . PHP_EOL;
}
// --
// plain
// 1 => 'a'
// 2 => 'b'
// 4 => 'c'
// 8 => 'd'
