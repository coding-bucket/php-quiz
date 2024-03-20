<?php

// OO-Inheritance 2
// --
// Is the following PHP code valid (since 8.0)?
// php
class A
{
    public function testUnion(bool $a): bool|int
    {
        return true;
    }
}

class B extends A
{
    public function testUnion(bool|int $a, int ...$b): int
    {
        return 1;
    }
}

$b = new B();
echo $b->testUnion(1);
// --
// text
// Yes.
// --

