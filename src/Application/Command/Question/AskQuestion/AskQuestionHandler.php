<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 27.12.2018
 * Time: 22:38
 */

namespace App\Application\Command\Question\AskQuestion;


use App\Domain\Question\Question;
use App\Domain\Question\Repository\QuestionRepositoryContract;

class AskQuestionHandler
{
    private $questionRepository;

    public function __construct(QuestionRepositoryContract $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function execute(EditQuestionCommand $command)
    {
        $question = new Question(
            $command->id(),
            $command->text(),
            $command->author()
        );

        $this->questionRepository->store($question);
    }
}