<?php

// Reference comparison
// --
// What will be the output of the following PHP code?
// php
class A
{
    public int $i;

    public function __construct(int $i)
    {
        $this->i = $i;
    }
}

$a = 1;
$b = 1;

$refA = &$a;
$refB = &$b;

var_dump($refA == $refB);
var_dump($refA === $refB);

$a = new A(1);
$b = new A(1);

$refA = &$a;
$refB = &$b;

var_dump($refA == $refB);
var_dump($refA === $refB);
// --
// plain
// bool(true)
// bool(true)
// bool(true)
// bool(false)
