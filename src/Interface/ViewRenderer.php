<?php

declare(strict_types=1);

namespace PHPQuiz\Interface;

interface ViewRenderer
{
    /**
     * @param array<string, mixed> $params
     */
    public function render(string $template, array $params = []): string;
}
