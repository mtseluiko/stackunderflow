<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 20.12.18
 * Time: 15:31
 */

namespace App\Domain\User;


use App\Domain\Answer\Answer;
use App\Domain\Id;
use App\Domain\Question\Question;
use App\Domain\Comment\Comment;
use App\Domain\Vote;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Domain\User\UserRepositoryContract")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="uuid")
     */
    private $id;

    /** @ORM\Embedded(class="UserEmail",columnPrefix=false) */
    private $email;

    /** @ORM\Embedded(class="UserPassword",columnPrefix=false) */
    private $password;

    /** @ORM\Embedded(class="UserProfile",columnPrefix=false) */
    private $profile;

    /** @ORM\OneToMany(targetEntity="\App\Domain\Question\Question",mappedBy="author") */
    private $questions;

    /** @ORM\OneToMany(targetEntity="\App\Domain\Answer\Answer",mappedBy="author") */
    private $answers;

    /** @ORM\OneToMany(targetEntity="\App\Domain\Comment\Comment",mappedBy="author") */
    private $comments;

    public function __construct(Id $id, UserEmail $email, UserPassword $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->profile = new UserProfile;
    }

    public function id(): Id
    {
        return $this->id;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function changePassword(UserPassword $password): void
    {
        $this->password = $password;
    }

    public function questions(): array
    {
        return $this->questions;
    }

    public function answers(): array
    {
        return $this->answers;
    }

    public function isEqualsTo(self $user): bool
    {
        return $this->id()->sameValueAs($user->id());
    }

    public function likeQuestion(Question $question): void
    {
        $vote = new Vote($this, Vote::VOTE_LIKE_TYPE);
        $question->addVote($vote);
    }

    public function dislikeQuestion(Question $question): void
    {
        $vote = new Vote($this, Vote::VOTE_DISLIKE_TYPE);
        $question->addVote($vote);
    }

    public function likeAnswer(Answer $answer): void
    {
        $vote = new Vote($this, Vote::VOTE_LIKE_TYPE);
        $answer->addVote($vote);
    }

    public function dislikeAnswer(Answer $answer): void
    {
        $vote = new Vote($this, Vote::VOTE_LIKE_TYPE);
        $answer->addVote($vote);
    }
}