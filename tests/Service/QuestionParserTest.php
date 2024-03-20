<?php

declare(strict_types=1);

namespace tests\PHPQuiz\Service;

use Exception;
use PHPQuiz\Model\QuestionCard;
use PHPQuiz\Util\QuestionParser;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

class QuestionParserTest extends TestCase
{
    /**
     * @dataProvider sourceProvider
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException|Exception
     */
    public function testParsesSourceCorrectly(string $source, QuestionCard $card): void
    {
        $questionCard = (new QuestionParser())->parse($source);
        self::assertEquals($card, $questionCard);
    }

    /**
     * @return array<array{0: string, 1:QuestionCard}>
     */
    public function sourceProvider(): array
    {
        return [
            'with explanation and links' => [
            <<<EOF
// title text
// --
// question text
// --
// text
// answer text
// --
// text
// explanation text
// --
// google.de/1
// google.de/2
EOF,
            new QuestionCard(
                'title text',
                '<p>question text</p>',
                '<p>answer text</p>',
                '<p>explanation text</p>',
                ['google.de/1', 'google.de/2']
            )
                ],

            'with explanation' => [
                <<<EOF
// title text
// --
// question text
// --
// text
// answer text
// --
// text
// explanation text
EOF,
                new QuestionCard(
                    'title text',
                    '<p>question text</p>',
                    '<p>answer text</p>',
                    '<p>explanation text</p>',
                    null
                )
            ],

            'only title, question and answer' => [
                <<<EOF
// title text
// --
// question text
// --
// text
// answer text
EOF,
                new QuestionCard(
                    'title text',
                    '<p>question text</p>',
                    '<p>answer text</p>',
                    null,
                    null
                )
            ]
        ];
    }
}
