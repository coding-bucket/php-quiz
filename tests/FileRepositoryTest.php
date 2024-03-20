<?php

declare(strict_types=1);

namespace tests\PHPQuiz;

use PHPQuiz\Exception\QuestionNotFoundException;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use SebastianBergmann\RecursionContext\InvalidArgumentException;

class FileRepositoryTest extends TestCase
{
    public function setUp(): void
    {
    }

    /**
     * @throws InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public function testQuestionRepositoryInitializedSuccessfully(): void
    {
        $repo = VFSFactory::getNonEmptyVirtualFileSystem();

        $categories = $repo->getQuestionsByCategory();
        self::assertCount(2, $categories);

        $questions = $repo->getQuestions();
        self::assertCount(5, $questions);
    }

    public function testEmptyQuestionRepositoryInitializedSuccessfully(): void
    {
        $repo = VFSFactory::getEmptyVirtualFileSystem();

        $categories = $repo->getQuestionsByCategory();
        self::assertCount(0, $categories);

        $questions = $repo->getQuestions();
        self::assertCount(0, $questions);
    }

    /**
     * @throws QuestionNotFoundException
     */
    public function testQuestionSuccessfullyFoundById(): void
    {
        $repo = VFSFactory::getNonEmptyVirtualFileSystem();

        $question = $repo->getQuestionById('122');
        static::assertEquals('122', $question->id);
    }

    /**
     * @throws QuestionNotFoundException
     */
    public function testQuestionNotFoundByIdThrowsException(): void
    {
        $repo = VFSFactory::getNonEmptyVirtualFileSystem();

        $this->expectException(QuestionNotFoundException::class);
        $repo->getQuestionById('100');
    }
}
