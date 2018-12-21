<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:47
 */

namespace App\Domain;


use App\Domain\Exception\TextIncorrectLengthException;

abstract class Text
{
    const MIN_TEXT_LENGTH = 5;
    const MAX_TEXT_LENGTH = 1000;

    protected $text;

    public function __construct(string $text)
    {
        $textLength = strlen($text);

        if (
            $textLength < self::MIN_TEXT_LENGTH ||
            $textLength > self::MAX_TEXT_LENGTH
        ) {
            throw new TextIncorrectLengthException;
        }

        $this->text = $text;
    }

    public function text(): string
    {
        return $this->text;
    }

    public function sameValueAs(self $text): bool
    {
        return $this->text() === $text->text();
    }
}