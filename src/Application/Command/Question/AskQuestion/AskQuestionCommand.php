<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 28.12.18
 * Time: 11:17
 */

namespace App\Application\Command\Question\AskQuestion;


use App\Domain\Question\QuestionText;
use App\Domain\Shared\Id;
use App\Domain\User\User;

class AskQuestionCommand
{
    private $questionId;
    private $author;
    private $text;

    public function __construct(Id $questionId, User $author, QuestionText $text)
    {
        $this->questionId = $questionId;
        $this->author = $author;
        $this->text = $text;
    }

    public function id(): Id
    {
        return $this->questionId;
    }

    public function author(): User
    {
        return $this->author;
    }

    public function text(): QuestionText
    {
        return $this->text;
    }
}