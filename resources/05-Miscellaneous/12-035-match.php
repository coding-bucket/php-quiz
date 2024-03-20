<?php

// <code>match</code>
// --
// What will be the output of the following PHP code?
// php
$key = 3;
$s = match ($key) {
    1 => 'a',
    2 => 'b'
};
var_dump($s);
// --
// plain
// PHP Fatal error:  Uncaught UnhandledMatchError: Unhandled match case '...' in ...
