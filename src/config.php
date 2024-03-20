<?php

declare(strict_types=1);

use PHPQuiz\Interface\QuestionRepository;
use PHPQuiz\Interface\ViewRenderer;
use PHPQuiz\Model\FileQuestionRepository;
use PHPQuiz\Service\TwigRenderer;

return [
    QuestionRepository::class => function () {
        $path = realpath(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'resources');
        if ($path === false) {
            throw new RuntimeException("resources directory not found");
        }
        return new FileQuestionRepository($path);
    },
    ViewRenderer::class => new TwigRenderer()
];
