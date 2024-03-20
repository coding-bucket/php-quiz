<?php

// Static variables 3
// --
// What will be the output of the following PHP code?
// php
class A
{
    public function useRef(): void
    {
        static $obj;

        var_dump($obj);
        if (!isset($obj)) {
            $new = new stdClass();
            $obj = &$new;
        }
    }
}
$a = new A();
$a->useRef();
$a->useRef();
// --
// plain
// NULL
// NULL
// --
// --
// www.php.net/manual/en/language.variables.scope.php#language.variables.scope.references
