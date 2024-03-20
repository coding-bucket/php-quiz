<?php

declare(strict_types=1);

namespace PHPQuiz\Controller;

use Exception;
use FilesystemIterator;
use PHPQuiz\Interface\QuestionRepository;
use PHPQuiz\Service\TwigRenderer;
use RuntimeException;
use SplFileInfo;

final readonly class StaticController
{
    public function __construct(
        private QuestionRepository $repository,
        private TwigRenderer       $view,
        private string             $staticFolder
    ) {
    }

    /**
     * @throws Exception
     */
    public function createStatic(): void
    {
        // delete existing static html files
        $this->deleteHTMLFiles($this->staticFolder);

        // generate index.html
        $mainCtr = new MainController($this->repository, $this->view);
        ob_start();
        $mainCtr->showStart();
        $renderedHtml = ob_get_contents();
        ob_end_clean();

        if ($renderedHtml === false) {
            throw new RuntimeException('Error generating index.html');
        }

        $this->saveStaticFile($this->staticFolder . DIRECTORY_SEPARATOR . 'index.html', $renderedHtml);

        // generate file for each question
        foreach ($this->repository->getQuestions() as $question) {
            $renderedHtml = $mainCtr->getRenderedHTML($question->id);
            $this->saveStaticFile($this->staticFolder . DIRECTORY_SEPARATOR . $question->id . '.html', $renderedHtml);
        }

        echo 'static files successfully generated' . PHP_EOL;
    }

    private function deleteHTMLFiles(string $path): void
    {
        $iterator = new FilesystemIterator($path, FilesystemIterator::SKIP_DOTS);

        /** @var SplFileInfo $item */
        foreach ($iterator as $item) {
            if ($item->getExtension() === 'html') {
                unlink($item->getPathname());
            }
        }
    }

    /**
     * @throws RuntimeException
     */
    private function saveStaticFile(string $filename, string $renderedHtml): void
    {
        // adjust links
        $renderedHtml = preg_replace('/href="(\d+)"/', 'href="${1}.html"', $renderedHtml);

        if (file_put_contents($filename, $renderedHtml) === false) {
            throw new RuntimeException('Error writing file "' . $filename . '"');
        }

        echo '"' . $filename . '" generated' . PHP_EOL;
    }
}
