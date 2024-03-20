<?php

// SensitiveParameter
// --
// What will be the output of the following PHP code?
// php
function login(
    string $user,
    #[SensitiveParameter]
    string $pass
) {
    throw new Exception('Invalid stuff happened');
}

login('admin', '123');
// --
// text
Before 8.0:
// plain
// Fatal error: Uncaught Exception: Invalid stuff happened in (...):6
// Stack trace:
// #0 (...)(9): login('admin', '123')
// #1 {main}
// thrown in /in/X99TC on line 6
// text
Since 8.0:
// plain
// Fatal error: Uncaught Exception: Invalid stuff happened in (...):6
// Stack trace:
// #0 (...)(9): login('admin', Object(SensitiveParameterValue))
// #1 {main}
// thrown in /in/X99TC on line 6
// --
// --
// www.php.net/manual/en/class.sensitiveparameter.php
// 3v4l.org/X99TC

