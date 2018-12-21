<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 19.12.18
 * Time: 12:14
 */

namespace App\Domain\User;


use App\Domain\Exception\UserNameEmptyException;
use App\Domain\Exception\UserNameIncorrectLengthException;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Embeddable */
final class UserName
{
    const MIN_USER_NAME_LENGTH = 3;
    const MAX_USER_NAME_LENGTH = 20;

    /** @ORM\Column(type="string",name="name") */
    private $name;

    public function __construct(string $name)
    {
        $nameLength = strlen($name);

        if ($nameLength === 0) {
            throw new UserNameEmptyException;
        }

        if (
            $nameLength < self::MIN_USER_NAME_LENGTH ||
            $nameLength > self::MAX_USER_NAME_LENGTH
        ) {
            throw new UserNameIncorrectLengthException;
        }

        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function isEqualsTo(self $name): bool
    {
        return $this->name() === $name->name();
    }
}