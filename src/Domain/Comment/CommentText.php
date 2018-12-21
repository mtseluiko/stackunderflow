<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:50
 */

namespace App\Domain\Comment;


use App\Domain\Text;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
final class CommentText extends Text
{
    /** @ORM\Column(type="text",name="text") */
    protected $text;
}