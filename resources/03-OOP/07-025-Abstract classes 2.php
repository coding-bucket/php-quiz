<?php

// Abstract classes 2
// --
// What is wrong with the code?
// php
final abstract class test
{
    public static function test() : void
    {
        echo "Hello";
    }
}

test::test();
// --
// An abstract class cannot be final.
