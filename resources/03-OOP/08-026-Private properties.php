<?php

// Private properties
// --
// What will be the output of the following PHP code?
// php
class A
{
    public function __construct(private string $prop) { }

    static function getPropFromOtherA(A $a): string
    {
        return $a->prop;
    }
}

echo A::getPropFromOtherA(new A('private property'));
// --
// plain
// private property
