<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:50
 */

namespace App\Domain\Question;


use App\Domain\Shared\Text;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
final class QuestionText extends Text
{
    /** @ORM\Column(type="text",name="text") */
    protected $text;
}