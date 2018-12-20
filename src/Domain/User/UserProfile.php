<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 12:05
 */

namespace App\Domain\User;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
class UserProfile
{
    /** @ORM\Embedded(class="UserName",columnPrefix=false) */
    private $name;

    public function __construct($name = '')
    {
        $this->name = new UserName($name);
    }

    public function setName(UserName $name): void
    {
        $this->name = $name;
    }

    public function name(): UserName
    {
        return $this->name;
    }
}