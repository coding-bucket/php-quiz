<?php

// Null coalescing
// --
// Simplify the following assignment with the
// - Null coalescing operator
// - Null coalescing assignment operator
// php
$name = isset($name) ? $name : 'Bob';
// --
// php
$name = $name ?? 'Bob';
$name ??= 'Bob';
// --
