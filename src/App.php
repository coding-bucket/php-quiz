<?php

declare(strict_types=1);

namespace PHPQuiz;

use DI\Container;
use DI\ContainerBuilder;
use FastRoute;
use FastRoute\RouteCollector;
use PHPQuiz\Controller\MainController;
use PHPQuiz\Exception\QuestionNotFoundException;
use PHPQuiz\Interface\QuestionRepository;
use PHPQuiz\Interface\ViewRenderer;
use PHPQuiz\Model\FileQuestionRepository;
use PHPQuiz\Service\TwigRenderer;
use RuntimeException;
use Whoops\Handler\PrettyPageHandler;
use Whoops\Run;

class App
{
    public readonly Container $container;

    public const RESOURCE_PATH = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'resources';
    public function __construct()
    {
        $this->setupErrorHandler();

        $resourcePath = realpath(self::RESOURCE_PATH);
        if ($resourcePath === false) {
            throw new RuntimeException("Resources directory not found.");
        }

        $config = [
            QuestionRepository::class => new FileQuestionRepository($resourcePath),
            ViewRenderer::class => new TwigRenderer()
        ];
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->addDefinitions($config);
        $this->container = $containerBuilder->build();
    }

    private function setupErrorHandler(): void
    {
        if (PHP_SAPI !== 'cli') {
            $whoops = new Run();
            $whoops->pushHandler(new PrettyPageHandler());
            $whoops->register();
        }
    }

    public function run(): void
    {
        $dispatcher = FastRoute\simpleDispatcher(function (RouteCollector $r): void {
            $r->addRoute('GET', '/', [MainController::class, 'showStart']);
            $r->addRoute('GET', '/{id:\d+}', [MainController::class, 'showQuestion']);
        });

        $route = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

        switch ($route[0]) {
            case FastRoute\Dispatcher::NOT_FOUND:
                header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
                echo '404 Not Found';
                break;

            case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
                header($_SERVER["SERVER_PROTOCOL"] . ' 405 Method Not Allowed');
                echo '405 Method Not Allowed';
                break;

            case FastRoute\Dispatcher::FOUND:
                /** @var callable $controller */
                $controller = $route[1];
                /** @var array<string, string> $parameters */
                $parameters = $route[2];

                try {
                    $this->container->call($controller, $parameters);
                } catch (QuestionNotFoundException) {
                    header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
                    echo '404 Not Found';
                }
                break;
        }
    }
}
