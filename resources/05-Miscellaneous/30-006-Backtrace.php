<?php

// Backtrace
// --
// How to output a backtrace?
// --
// php
debug_print_backtrace(int $options = 0, int $limit = 0): void
// text
// or
// php
$e = new Exception();
print_r($e->getTraceAsString());

