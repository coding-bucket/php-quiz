<?php

// Exception Handling 2
// --
// What will be the output of the following PHP code?
// php
try {
    throw new Exception();
} catch (Error $e) {
    echo 'Error ';
} catch (Exception $e) {
    echo 'Exception ';
}

try {
    throw new Error();
} catch (Exception $e) {
    echo 'Exception ';
} catch (Error $e) {
    echo 'Error ';
}

try {
    throw new Exception();
} catch (Throwable $e) {
    echo 'Throwable ';
}

try {
    throw new Error();
} catch (Throwable $e) {
    echo 'Throwable';
}
// --
// plain
// Exception Error Throwable Throwable

