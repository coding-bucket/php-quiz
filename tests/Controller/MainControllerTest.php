<?php

declare(strict_types=1);

namespace tests\PHPQuiz\Controller;

use PHPQuiz\Exception\FilenameException;
use PHPQuiz\Interface\QuestionRepository;
use PHPQuiz\Interface\ViewRenderer;
use PHPQuiz\Controller\MainController;
use PHPQuiz\Model\FileQuestionRepository;
use PHPQuiz\Service\TwigRenderer;
use PHPUnit\Framework\Constraint\ArrayHasKey;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class MainControllerTest extends TestCase
{
    private QuestionRepository $rep;

    /**
     * @return void
     * @throws RuntimeException|FilenameException
     */
    public function setUp(): void
    {
        parent::setUp();
        $DS = DIRECTORY_SEPARATOR;
        $path = realpath(__DIR__ . $DS . '..' . $DS . '..' . $DS . 'resources');
        if ($path === false) {
            throw new RuntimeException();
        }
        $this->rep = new FileQuestionRepository($path);
    }

    public function testCallsRenderMethodWithArguments(): void
    {
        $constraints = self::logicalAnd();
        $constraints->setConstraints([new ArrayHasKey('question'), new ArrayHasKey('question_card')]);
        $renderer = $this->createMock(ViewRenderer::class);
        $renderer->expects(self::once())->method('render')->with('main', $constraints);
        $ctrl = new MainController($this->rep, $renderer);
        $ctrl->getRenderedHTML('010');
    }

    public function testFrontPageIssuedSuccessfully() : void
    {
        $this->expectOutputRegex('*If not mentioned otherwise, *');
        $ctrl = new MainController($this->rep, new TwigRenderer());
        $ctrl->showStart();
    }
}
