<?php

// Float multiplication
// --
// What will be the output of the following PHP code?
// php
$n = "19.99";
var_dump($n * 100);

var_dump((string) ($n * 100));
var_dump(strval($n * 100));

var_dump((int) ($n * 100));
var_dump(intval($n * 100));
// --
// plain
// float(1998.9999999999998)
// string(4) "1999"
// string(4) "1999"
// int(1998)
// int(1998)
