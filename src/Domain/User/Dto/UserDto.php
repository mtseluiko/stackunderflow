<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 24.12.18
 * Time: 11:32
 */

namespace App\Domain\User\Dto;


use App\Domain\User\User;

final class UserDto
{
    private $id;
    private $name;

    public function __construct(User $user)
    {
        $this->id = $user->id()->id();
        $this->name = $user->profile()->name()->name();
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}