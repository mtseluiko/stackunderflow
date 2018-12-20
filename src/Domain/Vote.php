<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 16:26
 */

namespace App\Domain;


use App\Domain\Exception\IncorrectVoteTypeException;
use App\Domain\User\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="vote_entity_type", type="string")
 * @ORM\DiscriminatorMap({"answer"="\App\Domain\Answer\AnswerVote", "question"="\App\Domain\Question\QuestionVote"})
 */
abstract class Vote
{
    const VOTE_LIKE_TYPE = 'like';
    const VOTE_DISLIKE_TYPE = 'dislike';

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="\App\Domain\User\User")
     */
    private $user;

    private $type;

    public function __construct(User $user, string $type)
    {
        if (
            $type != self::VOTE_LIKE_TYPE &&
            $type != self::VOTE_DISLIKE_TYPE
        ) {
            throw new IncorrectVoteTypeException;
        }

        $this->user = $user;
        $this->type = $type;
    }

    public function user(): User
    {
        return $this->user;
    }

    public function type(): string
    {
        return $this->type;
    }

    public function sameValueOf(Vote $vote): bool
    {
        return (
            $this->user()->isEqualsTo($vote->user()) &&
            $this->type() === $vote->type()
        );
    }
}