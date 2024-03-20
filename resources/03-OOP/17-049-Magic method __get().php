<?php

// Magic method <code>__get()</code>
// --
// What will be the output of the following PHP code?
// php
class Magic
{
    public string $a = 'i am public';

    protected string $b = 'i am protected';

    private string $c = 'i am private';

    public function __construct()
    {
    }

    public function __get(string $name) : mixed
    {
        return 'fetched from magic method: ' . match ($name) {
            'a' => $this->a,
            'b' => $this->b,
            'c' => $this->c,
            default => 'other variable'
        };
    }
}

$magic = new Magic();
var_dump($magic->a, $magic->b, $magic->c, $magic->d);
// --
// plain
// string(11) "i am public"
// string(41) "fetched from magic method: i am protected"
// string(39) "fetched from magic method: i am private"
// string(41) "fetched from magic method: other variable"
// --
// <code>__get()</code> is only invoked for
// - non-existent properties
// - invisible properties (<code>private</code> and <code>protected</code> in this case)
