<?php

// Exception Handling 5
// --
// What will be the output of the following PHP code?
// php
function foo(): int
{
    try {
        throw new Exception();
        return 1;
    } catch (Exception $e) {
        return 2;
    } finally {
        return 3;
    }
}
echo foo();
// --
// plain
// 3
// --
// text
// A <code>return</code> statement in the <code>finally</code> block overrides a <code>return</code> statement in the <code>try</code> or <code>catch</code> block.
// --
// www.phptutorial.net/php-oop/php-try-catch-finally/
// stackoverflow.com/questions/41616790/how-is-the-keyword-finally-meant-to-be-used-in-php
