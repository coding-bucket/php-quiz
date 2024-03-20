<?php

declare(strict_types=1);

namespace PHPQuiz\Model;

final readonly class Question
{
    public function __construct(
        public string   $id,
        public string   $title,
        public int      $index,
        public Category $category
    ) {
    }
}
