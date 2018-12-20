<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 12:10
 */

namespace App\Domain\User;

use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
class UserPassword
{
    /** @ORM\Column(type="string",name="password") */
    private $encryptedPassword;

    public function __construct(string $password)
    {
        $this->encryptedPassword = password_hash($password, PASSWORD_DEFAULT);
    }

    public function verifyPassword($password): bool
    {
        return password_verify($password, $this->encryptedPassword);
    }
}