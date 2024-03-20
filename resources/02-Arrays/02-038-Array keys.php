<?php

// Array keys
// --
// What will be the output of the following PHP code?
// php
$array = ['a' => null];
var_dump(isset($array['a']));
var_dump(array_key_exists('a', $array));
// --
// plain
// bool(false)
// bool(true)
// --
// --
// www.php.net/manual/de/function.isset.php
