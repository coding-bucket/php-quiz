<?php

declare(strict_types=1);

namespace PHPQuiz\Service;

use PHPQuiz\Interface\ViewRenderer;
use RuntimeException;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

final class TwigRenderer implements ViewRenderer
{
    private static string $tmplDir = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' .
        DIRECTORY_SEPARATOR . 'tmpl';
    private Environment $twig;

    public function __construct()
    {
        $this->twig = new Environment(
            new FilesystemLoader([self::$tmplDir]),
            [
                'cache' => false,
                'strict_variables' => true,
                'auto_reload' => true
            ]
        );
    }

    /**
     * @param array<string, mixed> $params
     * @throws RuntimeException
     */
    public function render(string $template, array $params = []): string
    {
        try {
            $output = $this->twig->render($template . '.twig', $params);
        } catch (LoaderError|RuntimeError|SyntaxError $e) {
            throw new RuntimeException('Twig error: ' . $e->getMessage() .
                ' in ' . $e->getFile() . '(' . (string)$e->getTemplateLine() . ')');
        }

        return $output;
    }
}
