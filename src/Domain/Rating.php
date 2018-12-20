<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 14:57
 */

namespace App\Domain;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
class Rating
{
    /** @ORM\Column(type="integer",name="rating") */
    private $rating;

    public function __construct()
    {
        $this->rating = 0;
    }

    public function rating(): int
    {
        return $this->rating;
    }

    public function isEqualsTo(self $rating): bool
    {
        return $this->rating() === $rating->rating();
    }

    public function increase(): void
    {
        $this->rating += 1;
    }

    public function decrease(): void
    {
        $this->rating -= 1;
    }
}