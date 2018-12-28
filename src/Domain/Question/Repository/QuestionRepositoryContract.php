<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 20.12.18
 * Time: 16:40
 */

namespace App\Domain\Question\Repository;


use App\Domain\Question\Question;
use App\Domain\Shared\Id;

interface QuestionRepositoryContract
{
    public function get(Id $questionId): ?Question;

    public function getAll(): array;

    public function store(Question $question): void;

    public function getNextId(): Id;

    public function remove(Question $question): void;

}