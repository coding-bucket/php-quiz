<?php

// OO-Inheritance 4
// --
// Is one of the two code snippets valid?
// text
// Snippet 1:
// php
class A
{
    public readonly int $prop;
}

class B extends A
{
    public int $prop;
}
// text
// Snippet 2:
// php
class A
{
    public int $prop;
}

class B extends A
{
    public readonly int $prop;
}
// --
// text
// Snippet 1:
// plain
// Fatal error: Cannot redeclare readonly property A::$prop as non-readonly B::$prop
// text
// Snippet 2:
// plain
// Fatal error: Cannot redeclare non-readonly property A::$prop as readonly B::$prop
