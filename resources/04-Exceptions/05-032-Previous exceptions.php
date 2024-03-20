<?php

// Exception Handling 3
// --
// What will be the output of the following PHP code?
// php
try {
    try {
        throw new \InvalidArgumentException('A');
    } catch (Exception $e) {
        throw new \LogicException(message: 'B', previous: $e);
    }
} catch (Exception $e) {
    echo $e->getMessage();
    echo $e->getPrevious()?->getMessage();
}
// --
// plain
// BA
