<?php

// Exception Handling 4
// --
// What will be the output of the following PHP code?
// php
try {
    try {
        throw new Exception('A');
    } finally {
        echo 'finally ';
        throw new Exception('B');
    }
} catch (Exception $e) {
    echo $e->getMessage();
    echo $e->getPrevious()->getMessage();
}
// --
// plain
// finally BA
// --
// text
// Code in the <code>finally</code> block is executed before an uncatched exception in the <code>try</code> block is propagated.
