<?php

// Static variables 2
// --
// What will be the output of the following PHP code?
// php
class A
{
    public function increase(): void
    {
        static $s=0;
        echo ++$s;
    }
}

$a = new A();
$a->increase();
$a->increase();

class B extends A {}

$b = new B();
$b->increase();
$b->increase();
// --
// plain
// 1212 (prior to PHP 8.1)
// 1234 (since PHP 8.1)
