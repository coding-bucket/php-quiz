<?php

// Types
// --
// Which function declarations are correct?
// php
function a(): mixed {
    return null;
}
function b(): null {
    return null;
}
function c(): null|int {
    return null;
}
function d(): void {
    return null;
}
function e(): bool {
    return false;
}
function f(): false {
    return false;
}
function g(): true {
    return true;
}
function h(): int|false {
    return false;
}
function i(): null|false {
    return false;
}
function j(): int|null|false {
    return false;
}
// --
// a: correct
// b: correct since PHP 8.2 - prior: <code>null</code> is not allowed as standalone type
// c: correct since PHP 8.0 (introduction of union types)
// d: A void function must not return a value.
// e: correct
// f: correct since PHP 8.2 - prior: <code>false</code> is not allowed as standalone type
// g: correct since PHP 8.2 - prior: <code>true</code> is not a type
// h: correct since PHP 8.0
// i: correct since PHP 8.2 - prior: <code>null|false</code> is not allowed (although they can be part of other union types)
// j: correct since PHP 8.0
// --
// In PHP 8.0 and 8.1 <code>null</code> and <code>false</code> can´t be used as standalone types.
// They can be part of a union type (however <code>null|false</code> is not allowed).
//
// Since PHP 8.2 they can be used as standalone types, can be part of a union type and <code>null|false</code> is allowed.
// --
// php.watch/versions/8.0/union-types
// php.watch/versions/8.2/null-false-types
// php.watch/versions/8.2/true-type

