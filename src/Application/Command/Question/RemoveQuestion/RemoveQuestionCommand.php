<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 28.12.18
 * Time: 11:17
 */

namespace App\Application\Command\Question\RemoveQuestion;


use App\Domain\Shared\Id;

class RemoveQuestionCommand
{
    private $questionId;

    public function __construct(Id $questionId)
    {
        $this->questionId = $questionId;
    }

    public function id(): Id
    {
        return $this->questionId;
    }
}