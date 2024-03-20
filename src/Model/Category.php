<?php

declare(strict_types=1);

namespace PHPQuiz\Model;

final class Category
{
    /**
     * @param Question[] $questions
     */
    public function __construct(
        public readonly string $id,
        public readonly string $title,
        public array           $questions = []
    ) {
    }
}
