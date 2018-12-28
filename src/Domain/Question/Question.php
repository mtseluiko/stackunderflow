<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:36
 */

namespace App\Domain\Question;


use App\Domain\Exception\RateOwnQuestionException;
use App\Domain\Shared\Id;
use App\Domain\Shared\Rating;
use App\Domain\User\User;
use App\Domain\Shared\Vote;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Domain\Question\QuestionRepositoryContract")
 */
class Question //Aggregate root
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="uuid")
     */
    private $id;

    /** @ORM\Embedded(class="QuestionText", columnPrefix=false) */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity="\App\Domain\User\User")
     */
    private $author;

    /** @ORM\Embedded(class="\App\Domain\Shared\Rating", columnPrefix=false) */
    private $rating;

    /**
     * @ORM\OneToMany(targetEntity="\App\Domain\Question\QuestionVote",mappedBy="question")
     */
    private $votes;

    /**
     * @ORM\OneToMany(targetEntity="\App\Domain\Question\QuestionComment",mappedBy="question")
     */
    private $comments;

    /**
     * @ORM\OneToMany(targetEntity="\App\Domain\Answer\Answer",mappedBy="question")
     */
    private $answers;

    public function __construct(Id $id, QuestionText $text, User $author)
    {
        $this->id = $id;
        $this->text = $text;
        $this->author = $author;
        $this->rating = new Rating;
        $this->votes = [];
    }

    public function id(): Id
    {
        return $this->id;
    }

    public function text(): QuestionText
    {
        return $this->text;
    }

    public function author(): User
    {
        return $this->author;
    }

    public function addVote(Vote $vote): void
    {
        if ($vote->user()->isEqualsTo($this->author)) {
            throw new RateOwnQuestionException;
        }

        switch ($vote->type()) {
            case Vote::VOTE_LIKE_TYPE:
                $this->rating = $this->rating->increase();
                break;
            case Vote::VOTE_DISLIKE_TYPE:
                $this->rating = $this->rating->decrease();
                break;
        }

        $this->votes[] = $vote;
    }

    public function answers(): array
    {
        return $this->answers;
    }

    public function editText(QuestionText $text): void
    {
        $this->text = $text;
    }
}