<?php

// OO-Inheritance
// --
// What will be the output of the following PHP code?
// text
// Snippet 1:
// php
class Foo
{
    public self $prop;
    public function __construct()
    {
        $this->prop = $this;
    }
}

class Bar extends Foo
{
    public self $prop;
}

$b = new Bar();
var_dump(get_class($b->prop));
// text
// Snippet 2:
// php
class Foo
{
    public Foo $prop;
    public function __construct()
    {
        $this->prop = $this;
    }
}

class Bar extends Foo
{
    public Bar $prop;
}

$b = new Bar();
var_dump(get_class($b->prop));
// --
// text
// Snippet 1 (since PHP 8.1):
// plain
// string(3) "Bar"
// text
// Snippet 2:
// plain
// PHP Fatal error: Type of Bar::$prop must be Foo (as in class Foo)
// --

