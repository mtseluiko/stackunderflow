<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 20.12.18
 * Time: 17:50
 */

namespace App\Domain\Answer;

use App\Domain\Vote;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class AnswerVote extends Vote
{
    /**
     * @ORM\ManyToOne(targetEntity="\App\Domain\Answer\Answer", inversedBy="answers")
     */
    protected $answer;
}