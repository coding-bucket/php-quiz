<?php

// Constants
// --
// What's the difference between defining a constant with <code>define()</code> and the keyword <code>const</code>?
// --
// <code>const</code> is handled at compile time, <code>define()</code> at run time.
// The leads to some differences between the two.
//
// <code>define()</code> allows a constant to be defined to an arbitrary expression.
// <code>const</code> allows a constant to be defined to only scalar (bool, int, float and string) expressions and constant arrays containing only scalar expressions. Also, it cannot be used to conditionally define a constant.
//
// Another difference we can notice occurs in the constant declarations in classes.
// <code>const</code> infiltrates the class scope, while <code>define()</code> leaks into the global scope.
// php
const PI = 22 / 7;                 // correct
define("PI2", 22 / 7);             // correct

function getValue(): int
{
    return 3;
}

const P3 = getValue();              // error
define("P4", getValue());           // correct

$obj = new class {};
const PI5 = $obj;                   // error - constants may only evaluate to scalar values, arrays or resources
define("PI6", $obj);                // error - constants may only evaluate to scalar values, arrays or resources

define('MIN_VALUE', 0.0);           // correct - works outside a class definition
const MIN_VALUE = 0.0;              // correct - works outside a class definition

class Constants
{
    define("MIN_VALUE", 0.0);       // error - doesn't work inside a class definition
    const MIN_VALUE = 0.0;          // correct - works inside a class definition

    public static function getMinValue()
    {
        define("MIN_VALUE", 0.0);   // correct - works inside a method definition
        const MIN_VALUE = 0.0;      // error - doesn't work inside a method definition
        return self::MIN_VALUE;
    }
}
// --
// --
// www.php.net/manual/en/language.constants.syntax.php#126727
// www.php.net/manual/en/language.constants.php#108717
