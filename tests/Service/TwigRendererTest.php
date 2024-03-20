<?php

declare(strict_types=1);

namespace tests\PHPQuiz\Service;

use PHPQuiz\Service\TwigRenderer;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class TwigRendererTest extends TestCase
{
    public function testCanRenderFrontPage(): void
    {
        $twigRenderer = new TwigRenderer();
        $output = $twigRenderer->render('main', ['question' => null, 'categories' => []]);
        static::assertStringContainsString('</html>', $output, 'TwigRenderer not returning start page code.');
    }

    public function testThrowsExceptionForNonexistentTemplate(): void
    {
        $this->expectException(RuntimeException::class);
        $twigRenderer = new TwigRenderer();
        $twigRenderer->render('NonexistentTemplateName');
    }
}
