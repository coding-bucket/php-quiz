<?php

// OO-Inheritance 3
// --
// Is one of the two code snippets valid?
// text
// Snippet 1:
// php
class A
{
    public function echoA(): void {
        echo 'a';
    }
}

class B extends A
{
    private function echoA(): void {
        echo 'a';
    }
}
// text
// Snippet 2:
// php
class A
{
    public function __construct() {
        echo 'a';
    }
}

class B extends A
{
    private function __construct() {
        echo 'b';
    }
}
// --
// text
// Snippet 1 throws a fatal error:
// plain
// Fatal error: Access level to B::echoA() must be public (as in class A)
// text
// Snippet 2 is valid:
// plain
// b
