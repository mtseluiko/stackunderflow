<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:36
 */

namespace App\Domain\Question;


use App\Domain\Exception\RateOwnQuestionException;
use App\Domain\Id;
use App\Domain\Rating;
use App\Domain\User\User;
use App\Domain\Vote;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Domain\Question\QuestionRepositoryContract")
 */
class Question
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

    /** @ORM\Embedded(class="\App\Domain\Rating", columnPrefix=false) */
    private $rating;

    /**
     * @ORM\OneToMany(targetEntity="\App\Domain\Question\QuestionVote",mappedBy="question")
     */
    private $votes;

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
                $this->rating->increase();
                break;
            case Vote::VOTE_DISLIKE_TYPE:
                $this->rating->decrease();
                break;
        }

        $this->votes[] = $vote;
    }
}