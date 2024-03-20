<?php

declare(strict_types=1);

use PHPQuiz\App;
use PHPQuiz\Controller\StaticController;
use PHPQuiz\Interface\QuestionRepository;
use PHPQuiz\Service\TwigRenderer;

require __DIR__ . '/../vendor/autoload.php';

$staticFolder = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'docs';
$app = new App();

/** @psalm-suppress MixedArgument */
$ctr = new StaticController(
    $app->container->get(QuestionRepository::class),
    $app->container->get(TwigRenderer::class),
    $staticFolder
);

try {
    $ctr->createStatic();
} catch (Exception $e) {
    do {
        echo $e->getMessage() . PHP_EOL;
        $e = $e->getPrevious();
    } while ($e !== null);
}
