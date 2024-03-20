<?php

// Bitwise Operators
// --
// What will be the output of the following PHP code?
// php
$x = 0b00000011;
$y = 0b00000101;
echo sprintf('%08b', (~$x ^ ~$y) << 3) . PHP_EOL; // a

var_dump(8 >> 3);           // b
var_dump(0 >> 0);           // c
var_dump(-1 >> 1);          // d
var_dump(PHP_INT_MAX << 1); // e
var_dump(-2 >> 1);          // f
var_dump('001100' << 3);    // g
var_dump(2 ^ 1);            // h
// --
// plain
// 00110000         // a
// int(1)           // b
// int(0)           // c
// int(-1)          // d
// int(-2)          // e
// int(-1)          // f
// int(8800)        // g
// int(3)           // h
// --
// --
// thephp.website/en/issue/bitwise-php/#introduction-to-binary-representation
// www.php.net/manual/de/language.types.integer.php
