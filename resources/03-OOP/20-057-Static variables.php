<?php

// Static variables
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

$b = new A();
$b->increase();
$b->increase();
// --
// plain
// 1234
