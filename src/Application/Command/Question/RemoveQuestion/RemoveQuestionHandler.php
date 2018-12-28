<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 27.12.2018
 * Time: 22:38
 */

namespace App\Application\Command\Question\RemoveQuestion;


use App\Domain\Question\Repository\QuestionRepositoryContract;

class RemoveQuestionHandler
{
    private $questionRepository;

    public function __construct(QuestionRepositoryContract $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function execute(RemoveQuestionCommand $command)
    {
        $question = $this->questionRepository->get($command->id());
        $this->questionRepository->remove($question);
    }
}