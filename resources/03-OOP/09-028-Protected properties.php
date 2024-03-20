<?php

// Protected properties
// --
// What will be the output of the following PHP code?
// php
class A
{
    public function __construct(protected string $prop) { }
}

class B extends A
{
    public static function getPropFromAnotherA(A $a): string
    {
        return $a->prop;
    }

    public static function getPropFromAnotherB(B $b): string
    {
        return $b->prop;
    }
}

echo B::getPropFromAnotherA(new A('A'));
echo B::getPropFromAnotherB(new B('B'));
// --
// plain
// AB
