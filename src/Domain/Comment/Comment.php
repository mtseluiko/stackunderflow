<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:36
 */

namespace App\Domain\Comment;


use App\Domain\Shared\Id;
use App\Domain\User\User;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="parent_type", type="string")
 * @ORM\DiscriminatorMap({"answer"="\App\Domain\Answer\AnswerComment", "question"="\App\Domain\Question\QuestionComment"})
 */
abstract class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(type="uuid")
     */
    private $id;

    /** @ORM\Embedded(class="CommentText", columnPrefix=false) */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity="\App\Domain\User\User")
     */
    private $author;

    public function __construct(Id $id, CommentText $text, User $author)
    {
        $this->id = $id;
        $this->text = $text;
        $this->author = $author;
    }

    public function id(): Id
    {
        return $this->id;
    }

    public function text(): CommentText
    {
        return $this->text;
    }

    public function author(): User
    {
        return $this->author;
    }
}