<?php

declare(strict_types=1);

namespace PHPQuiz\Util;

use function str_starts_with;

final class Partial
{
    public function __construct(public string $value, public string|null $beginDelimiter, public string|null $endDelimiter)
    {
    }

    /**
     * @param string[] $delimiters
     * @return Partial[]
     */
    public static function explode(array $delimiters, string $string): array
    {
        $cursor = 0;
        $delimiterAtCursor = null;
        $partials = [];

        for ($i = 0, $iMax = strlen($string); $i < $iMax; $i++) {
            foreach ($delimiters as $delimiter) {
                if (str_starts_with(substr($string, $i), $delimiter)) {
                    if ($i > 0) {
                        $partials[] = new Partial(
                            substr($string, $cursor, $i - $cursor),
                            $delimiterAtCursor,
                            $delimiter
                        );
                    }

                    $cursor = $i + strlen($delimiter);
                    $delimiterAtCursor = $delimiter;
                    break;
                }
            }
        }
        if ($cursor < strlen($string)) {
            $partials[] = new Partial(substr($string, $cursor), $delimiterAtCursor, null);
        }

        return $partials;
    }

    /**
     * @param Partial[] $partials
     */
    public static function implode(array $partials): string
    {
        $result = '';

        foreach ($partials as $partial) {
            $result .= ($partial->beginDelimiter ?? '') . $partial->value;
        }

        /** @var Partial|null $partial */
        if (isset($partial)) {
            $result .= $partial->endDelimiter ?? '';
        }

        return $result;
    }
}
