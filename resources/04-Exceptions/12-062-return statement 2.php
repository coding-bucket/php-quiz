<?php

// Exception Handling 6
// --
// What will be the output of the following PHP code?
// php
function foo(int &$x)
{
    try {
        $x = 2;
        return $x;
    } finally {
        $x = 3;
    }
}

$bar = 1;
echo foo($bar) . $bar;
// --
// plain
// 23
// --
// text
// Code in the <code>finally</code> block is executed after a return statement in the <code>try</code> block.
// --
// stackoverflow.com/questions/41616790/how-is-the-keyword-finally-meant-to-be-used-in-php
