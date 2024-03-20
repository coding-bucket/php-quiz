<?php

// Cloning objects
// --
// What will be the output of the following PHP code?
// php
class MyTimer
{
    public function __construct(public DateTime $d)
    {
    }
}

$funnyDate = new MyTimer(new DateTime('2022-02-02'));

$y2kDate = clone $funnyDate;
$y2kDate->d = new DateTime('2000-01-01');

echo $funnyDate->d->format('Y-m-d') . PHP_EOL;


$funnyDate = new MyTimer(new DateTime('2022-02-02'));

$y2kDate = clone $funnyDate;
$y2kDate->d->setDate(2000,1,1);

echo $funnyDate->d->format('Y-m-d');
// --
// plain
// 2022-02-02
// 2000-01-01
// --
// <blockquote>When an object is cloned, PHP will perform a <em>shallow copy</em> of all the object's properties. Any properties that are references to other variables will remain references.</blockquote>
// --
// www.php.net/manual/en/language.oop5.cloning.php
