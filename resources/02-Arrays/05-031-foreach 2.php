<?php

// <code>foreach</code> statement 2
// --
// Which statements are valid?
// php
$a = ['a', 'b', 'c'];
foreach ($a as $key => $datum) {  // a
}
foreach ($a as $key => &$datum) {  // b
}
foreach ($a as &$key => $datum) {  // c
}
foreach ($a as &$key => &$datum) {  // d
}
// --
// a and b are valid, c and d are invalid. The key in a <code>foreach</code> statement cannot be a reference.
