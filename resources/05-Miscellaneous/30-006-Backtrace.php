<?php

// Backtrace
// --
// How to output a backtrace?
// --
// text
// Use <code>debug_print_backtrace()</code> function to output a backtrace:
// php
debug_print_backtrace(int $options = 0, int $limit = 0): void
// text
// Or use the following code:
// php
$e = new Exception();
print_r($e->getTraceAsString());

