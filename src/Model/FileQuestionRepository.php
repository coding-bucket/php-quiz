<?php

declare(strict_types=1);

namespace PHPQuiz\Model;

use PHPQuiz\Exception\FilenameException;
use PHPQuiz\Exception\ParseException;
use PHPQuiz\Exception\QuestionNotFoundException;
use PHPQuiz\Interface\QuestionRepository;
use PHPQuiz\Util\QuestionParser;

final class FileQuestionRepository implements QuestionRepository
{
    private const FILE_SUFFIX = '.php';

    /** @var array<string, Category> */
    private array $categories;

    /** @var array<int, Question> */
    private array $questionsByIndex = [];

    /** @var array<string, string> */
    private array $filePathsById = [];

    private QuestionParser $questionParser;

    /**
     * @throws FilenameException
     */
    public function __construct(string $resourcePath)
    {
        $this->categories = $this->readCategories($resourcePath);

        foreach ($this->categories as $path => $category) {
            $category->questions = $this->readQuestions($category, $path);
        }

        $this->questionParser = new QuestionParser();
    }

    /**
     * @return array<string, Category>
     * @throws FilenameException
     */
    private function readCategories(string $path): array
    {
        $categories = [];
        $directoryNames = $this->listFileSystemObjects($path, true);

        foreach ($directoryNames as $directoryName) {
            $parts = explode('-', $directoryName, 2);
            $id = $parts[0] ?? null;
            $title = $parts[1] ?? '';

            if ($id === null || $title === '') {
                throw new FilenameException('Incorrect directory name format: ' . $directoryName);
            }

            $categories[$path . DIRECTORY_SEPARATOR . $directoryName] = new Category($id, $title);
        }

        return $categories;
    }

    /**
     * @return string[]
     */
    private function listFileSystemObjects(string $path, bool $returnDirectories): array
    {
        $fileList = scandir($path);

        if ($fileList === false) {
            return [];
        }

        $list = array_diff($fileList, ['.', '..']);

        return array_filter(
            $list,
            static function (string $item) use ($path, $returnDirectories) {
                return $returnDirectories === is_dir($path . DIRECTORY_SEPARATOR . $item);
            }
        );
    }

    /**
     * @return Question[]
     * @throws FilenameException
     */
    private function readQuestions(Category $category, string $path): array
    {
        $questions = [];

        /** @phpstan-var int $index */
        static $index = 1;
        $filenames = $this->listFileSystemObjects($path, false);

        foreach ($filenames as $filename) {
            $parts = explode('-', $filename, 3);
            $id = $parts[1] ?? null;
            $title = substr($parts[2] ?? '', 0, strlen(self::FILE_SUFFIX) * -1);

            if ($id === null || $title === '') {
                throw new FilenameException('Incorrect filename format: ' . $filename);
            }

            $questions[$id] = new Question($id, $title, $index, $category);
            $this->questionsByIndex[$index] = $questions[$id];
            $this->filePathsById[$id] = $path . DIRECTORY_SEPARATOR . $filename;
            $index++;
        }

        return $questions;
    }

    /**
     * @return Category[]
     */
    public function getQuestionsByCategory(): array
    {
        return $this->categories;
    }

    /**
     * @return Question[]
     */
    public function getQuestions(): array
    {
        return $this->questionsByIndex;
    }

    public function getQuestionById(string $id): Question
    {
        foreach ($this->categories as $category) {
            if (array_key_exists($id, $category->questions)) {
                return $category->questions[$id];
            }
        }

        throw new QuestionNotFoundException();
    }

    public function getQuestionByIndex(int $index): Question
    {
        return $this->questionsByIndex[$index] ?? throw new QuestionNotFoundException();
    }

    public function count(): int
    {
        return count($this->questionsByIndex);
    }

    /**
     * @throws QuestionNotFoundException|ParseException
     */
    public function getQuestionCardForId(string $id): QuestionCard
    {
        $markup = file_get_contents($this->filePathsById[$id]);

        if ($markup === false) {
            throw new QuestionNotFoundException();
        }

        try {
            $card = $this->questionParser->parse($markup);
        } catch (ParseException $e) {
            $message = 'Error creating QuestionCard for ' . $this->filePathsById[$id];
            throw new ParseException($message, 0, $e);
        }
        return $card;
    }
}
