<?php

// Integer overflow
// --
// What is the hexadecimal number of <code>PHP_INT_MAX</code> and <code>PHP_INT_MIN</code> on 64-bit platforms?
// --
// text
// The following code
// php
echo 'PHP_INT_MAX: ' . dechex(PHP_INT_MAX) . PHP_EOL;
echo 'PHP_INT_MIN: ' . dechex(PHP_INT_MIN) . PHP_EOL;
// text
// gives the results:
// plain
// PHP_INT_MAX: 7fffffffffffffff
// PHP_INT_MIN: 8000000000000000
// text
// But be aware that
// php
echo 0x7FFFFFFFFFFFFFFF . PHP_EOL;
echo 0x8000000000000000 . PHP_EOL;
// text
// results in
// plain
// 9223372036854775807
// 9.2233720368548E+18
// --
// --
// www.php.net/manual/de/function.dechex.php
// www.php.net/manual/de/language.types.integer.php
