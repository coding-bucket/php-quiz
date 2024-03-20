<?php

declare(strict_types=1);

namespace tests\PHPQuiz;

use PHPQuiz\Util\Partial;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

class PartialTest extends TestCase
{
    /**
     * @dataProvider sourceProvider
     * @param array<string> $delimiters
     * @param string $string
     * @param array<Partial> $expectedResult
     * @return void
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public function testExplode(array $delimiters, string $string, array $expectedResult): void
    {
        $result = Partial::explode($delimiters, $string);
        self::assertEquals($expectedResult, $result, 'array after explosion not correct with string ' . $string);
    }

    /**
     * @return array<array{0: string[], 1: string, 2: Partial[]}>
     */
    public function sourceProvider(): array
    {
        return [
            'a-b' => [
                ['-'],
                'a-b',
                [
                    new Partial('a', null, '-'),
                    new Partial('b', '-', null)]
            ],
            'a-b-c-' => [
                ['-'],
                'a-b-c-',
                [
                    new Partial('a', null, '-'),
                    new Partial('b', '-', '-'),
                    new Partial('c', '-', '-')
                ]
            ],
            '-a-b-c' => [
                ['-'],
                '-a-b-c',
                [
                    new Partial('a', '-', '-'),
                    new Partial('b', '-', '-'),
                    new Partial('c', '-', null)
                ]
            ],

            'a--b' => [
                ['-'],
                'a--b',
                [
                    new Partial('a', null, '-'),
                    new Partial('', '-', '-'),
                    new Partial('b', '-', null)
                ]
            ],
            'a-b+c' => [
                ['-', '+'],
                'a-b+c',
                [
                    new Partial('a', null, '-'),
                    new Partial('b', '-', '+'),
                    new Partial('c', '+', null)
                ]
            ],
            '+a-b-c+' => [
                ['-', '+'],
                '+a-b+c+',
                [
                    new Partial('a', '+', '-'),
                    new Partial('b', '-', '+'),
                    new Partial('c', '+', '+')
                ]
            ],
            '---a---b++c++' => [
                ['---', '++'],
                '---a---b++c++',
                [
                    new Partial('a', '---', '---'),
                    new Partial('b', '---', '++'),
                    new Partial('c', '++', '++')
                ]
            ],
            '---a--b+c++' => [
                ['---', '++'],
                '---a--b+c++',
                [
                    new Partial('a--b+c', '---', '++'),
                ]
            ],
        ];
    }

    /**
     * @dataProvider sourceProvider
     * @param array<string> $delimiters
     * @param string $string
     * @return void
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public function testImplode(array $delimiters, string $string): void
    {
        $partials = Partial::explode($delimiters, $string);
        $rewind = Partial::implode($partials);
        self::assertEquals($string, $rewind);
    }
}
