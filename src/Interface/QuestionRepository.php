<?php

declare(strict_types=1);

namespace PHPQuiz\Interface;

use PHPQuiz\Exception\ParseException;
use PHPQuiz\Exception\QuestionNotFoundException;
use PHPQuiz\Model\Category;
use PHPQuiz\Model\Question;
use PHPQuiz\Model\QuestionCard;

interface QuestionRepository
{
    /**
     * @return Category[]
     */
    public function getQuestionsByCategory(): array;

    /**
     * @throws QuestionNotFoundException|ParseException
     */
    public function getQuestionCardForId(string $id): QuestionCard;

    /**
     * @return Question[]
     */
    public function getQuestions(): array;

    /**
     * @throws QuestionNotFoundException
     */
    public function getQuestionById(string $id): Question;

    /**
     * @throws QuestionNotFoundException
     */
    public function getQuestionByIndex(int $index): Question;

    public function count(): int;
}
