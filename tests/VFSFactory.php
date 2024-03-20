<?php

declare(strict_types=1);

namespace tests\PHPQuiz;

use org\bovigo\vfs\vfsStream;
use PHPQuiz\Model\FileQuestionRepository;

class VFSFactory
{
    /** @var array<string, array<string, array<string, string>>> */
    private static array $nonEmptyFileSystem = [
        'resources' => [
            '01-Category1' => [
                '01-123-first question.php' => 'content for the first question in first category',
                '02-133-second question.php' => 'content for the second question in first category',
            ],
            '02-Category2' => [
                '01-122-first question in second category' => 'content for the first question in second category',
                '02-134-second question in second category' => 'content for the second question in second category',
                '03-155-third question in second category' => 'content for the third question in second category',
            ],
        ]
    ];

    /** @var array<string, array> */
    private static array $emptyFileSystem = [
        'resources' => []
    ];

    public static function getNonEmptyVirtualFileSystem(): FileQuestionRepository
    {
        $root = vfsStream::setup('root', null, self::$nonEmptyFileSystem);
        return new FileQuestionRepository($root->getChild('resources')->url());
    }

    public static function getEmptyVirtualFileSystem(): FileQuestionRepository
    {
        $root = vfsStream::setup('root', null, self::$emptyFileSystem);
        return new FileQuestionRepository($root->getChild('resources')->url());
    }
}
