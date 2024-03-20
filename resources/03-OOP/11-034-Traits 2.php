<?php

// Traits 2
// --
// Does the following code execute without warnings?
// php
trait MyTrait
{
    public function caller(): void
    {
        $this->callMethod();
    }
}

class MyClass
{
    use MyTrait;

    public function run() : void
    {
        $this->caller();
    }

    public function callMethod() : void
    {
        echo 'a';
    }
}

(new MyClass())->run();
// --
// Yes, although the method <code>callMethod()</code> should be declared as abstract method in <code>MyTrait</code>.
