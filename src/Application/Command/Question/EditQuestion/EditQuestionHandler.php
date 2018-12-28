<?php
/**
 * Created by PhpStorm.
 * User: Mihail
 * Date: 27.12.2018
 * Time: 22:38
 */

namespace App\Application\Command\Question\EditQuestion;


use App\Domain\Question\Question;
use App\Domain\Question\Repository\QuestionRepositoryContract;

class EditQuestionHandler
{
    private $questionRepository;

    public function __construct(QuestionRepositoryContract $questionRepository)
    {
        $this->questionRepository = $questionRepository;
    }

    public function execute(EditQuestionCommand $command)
    {
        $question = $this->questionRepository->get($command->id());

        $question->editText($command->text());

        $this->questionRepository->store($question);
    }
}