<?php

// Sorting arrays
// --
// Use <code>usort()</code>, an arrow function and the spaceship operator to sort the following array:
// php
$array = [1, 4, 5, 6, 7, 8, 9, 2];
// --
// php
usort($array, fn($a, $b) => $a <=> $b);
// --
// Note: Sorting functions in PHP were unstable before PHP 8.0, which means that the order of “equal” elements was not guaranteed.
// --
// wiki.php.net/rfc/stable_sorting
