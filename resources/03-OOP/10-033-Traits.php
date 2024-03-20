<?php

// Traits
// --
// Is the following code valid?
// php
trait MyTrait
{
    abstract public function callMethod() : void;
}

class MyClass
{
    use MyTrait;

    public function callMethod() : void
    {
        echo 'a';
    }
}

(new MyClass())->callMethod();
// --
// Yes. A trait can have abstract methods. They must be implemented by classes using the trait.
