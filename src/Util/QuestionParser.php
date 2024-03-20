<?php

declare(strict_types=1);

namespace PHPQuiz\Util;

use PHPQuiz\Exception\ParseException;
use PHPQuiz\Model\QuestionCard;
use function count;

final class QuestionParser
{
    /**
     * @throws ParseException
     */
    public function parse(string $markup): QuestionCard
    {
        $start = strpos($markup, '//');

        if ($start === false) {
            throw new ParseException("Invalid question format. Missing header.");
        }

        $markup = substr($markup, $start);
        $parts = explode('// --', $markup);

        if (count($parts) < 3) {
            throw new ParseException("Invalid question format. Not enough sections.");
        }

        $header = trim(str_replace('// ', '', $parts[0] ?? ''));
        $question = $this->toHTML($parts[1]);
        $answer = $this->toHTML($parts[2]);
        $explanation = isset($parts[3]) ? $this->toHTML($parts[3]) : null;
        $source = null;

        if (isset($parts[4])) {
            $source = preg_split("/\r\n|\n|\r/", trim(str_replace('// ', '', $parts[4])));
            $source = $source !== false ? $source : null;
        }

        return new QuestionCard($header, $question, $answer, $explanation, $source);
    }


    private function toHTML(string $markup): string
    {
        $partials = Partial::explode(['// php', '// text', '// plain'], $markup);
        $html = '';

        foreach ($partials as $partial) {
            $html .= $this->decoratePartial($partial);
        }

        return $html;
    }

    private function decoratePartial(Partial $partial): string
    {
        $partialText = trim($partial->value);

        if ($partialText === '') {
            return '';
        }

        switch ($partial->beginDelimiter) {
            case '// php':
                return '<pre class="allow_copy"><code class="language-php">' . $partialText . '</code></pre>';
            case '// plain':
                $plain = str_replace('// ', '', $partialText);
                return '<pre><code class="language-plaintext nohljsln">' . $plain . '</code></pre>';
            default:
                $paragraph = nl2br(trim(str_replace('//', '', $partialText)));
                return strlen($paragraph) > 2 ? '<p>' . $paragraph . '</p>' : '';
        }
    }
}
