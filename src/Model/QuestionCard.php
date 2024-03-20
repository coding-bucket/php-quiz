<?php

declare(strict_types=1);

namespace PHPQuiz\Model;

final readonly class QuestionCard
{
    /**
     * @param String[]|null $sources
     */
    public function __construct(
        public string      $header,
        public string      $question,
        public string      $answer,
        public string|null $explanation = null,
        public array|null  $sources = null
    ) {
    }
}
