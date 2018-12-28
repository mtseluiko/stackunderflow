<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 28.12.18
 * Time: 11:17
 */

namespace App\Application\Command\Question\EditQuestion;


use App\Domain\Question\QuestionText;
use App\Domain\Shared\Id;

class EditQuestionCommand
{
    private $questionId;
    private $text;

    public function __construct(Id $questionId, QuestionText $text)
    {
        $this->questionId = $questionId;
        $this->text = $text;
    }

    public function id(): Id
    {
        return $this->questionId;
    }

    public function text(): QuestionText
    {
        return $this->text;
    }
}