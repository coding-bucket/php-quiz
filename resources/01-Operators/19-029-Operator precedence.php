<?php

// Operator precedence
// --
// Order the operators <code>-></code>, <code>.</code> and <code>(string) cast</code> by their precedence:
// --
// By descending precedence: <code>-></code> - <code>(string) cast</code> - <code>.</code>
// --
// text
// Example:
// php
class A
{
    public int $b = 3;
}
$a = new A();
echo (string) $a->b . ' apples';
// text
// outputs
// plain
// 3 apples
