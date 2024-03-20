<?php

// Callables
// --
// A callback is a reference to a function or method that can be called later.
// List various ways to implement a callback.
// php
class A
{
    public static function process(callable $c) : void
    {
        /* ... */
    }
}
// --
// 1. A <u>global function</u> can be passed by its name as a string.
// php
A::process('some_global_php_function');

// text
// 2. An <u>anonymous function</u> can be passed to a callback parameter:
// php
A::process(function () {
    // process something directly here...
});

// text
// 3. A <u>class method</u> can be passed as an array containing an instantiated object of the class at index 0 and the method name at index 1:
// php
// only from inside the same class
A::process([$this, 'myCallback']);
A::process([$this, 'myStaticCallback']);
// from either inside or outside the same class
A::process([new MyClass(), 'myCallback']);
A::process([new MyClass(), 'myStaticCallback']);

// text
// 4. A <u>static class method</u> can be passed without instantiating an object of that class by passing
// the class name instead of an object at index 0:
// php
// only from inside the same class
A::process([__CLASS__, 'myStaticCallback']);
// from either inside or outside the same class
A::process(['MyClass', 'myStaticCallback']);
A::process(['MyClass::myStaticCallback']);
A::process([MyClass::class, 'myStaticCallback']);

// text
// 5. Use an <u>invokable class</u>:
// php
class MyClass {
    public function __invoke() {
        // callable code here
    }
}
A::process(new MyClass());

// for example
class Incrementor {
    public function __invoke(int $i): int {
        return ++$i;
    }
}
var_dump(array_map(new Incrementor(), [0, 1, 2, 3]));
