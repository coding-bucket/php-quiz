<?php

// Exception Handling 1
// --
// What will be the output of the following PHP code?
// php
interface ExceptionI extends Throwable { };
class ExceptionA extends Exception implements ExceptionI { }
class ExceptionB extends Exception implements ExceptionI { }

try {
    throw new ExceptionA();
} catch (ExceptionI $e) {
    echo 'i';
} catch (ExceptionA $e) {
    echo 'a';
} finally {
    echo '-';
}

try {
    throw new ExceptionA();
} catch (ExceptionA $e) {
    echo 'a';
} catch (ExceptionI $e) {
    echo 'i';
} finally {
    echo '-';
}

try {
    throw new ExceptionA();
} catch (ExceptionA | ExceptionB $e) {
    echo 'ab';
} catch (ExceptionA $e) {
    echo 'a';
} finally {
    echo '-';
}
// --
// plain
// i-a-ab-
