<?php

// Generators
// --
// Write a generator function <code>abc()</code> that returns the characters of the english alphabet.
// php
foreach(abc() as $c) {
    echo $c.PHP_EOL;
}
// --
// php
function abc(): Generator
{
    for ($c = ord('a'); $c <= ord('z'); $c++) {
        yield chr($c);
    }
}


