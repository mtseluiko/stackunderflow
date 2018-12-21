<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 12:10
 */

namespace App\Domain\User;

use App\Domain\Exception\InvalidEmailException;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Validation;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
final class UserEmail
{
    /** @ORM\Column(type="string",name="email") */
    private $email;

    public function __construct(string $email)
    {
        $email = trim($email);

        $validator = Validation::createValidator();
        $emailConstraint = new Assert\Email();
        $errors = $validator->validate(
            $email,
            $emailConstraint
        );

        if (count($errors) > 0) {
            throw new InvalidEmailException;
        }

        $this->email = $email;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function isEqualsTo(self $email): bool
    {
        return $this->email() === $email->email();
    }
}