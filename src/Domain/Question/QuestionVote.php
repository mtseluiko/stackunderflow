<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 20.12.18
 * Time: 17:50
 */

namespace App\Domain\Question;

use App\Domain\Shared\Vote;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
final class QuestionVote extends Vote
{
    /**
     * @ORM\ManyToOne(targetEntity="\App\Domain\Question\Question", inversedBy="questions")
     */
    private $question;
}