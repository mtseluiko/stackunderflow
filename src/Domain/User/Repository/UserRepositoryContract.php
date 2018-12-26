<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 20.12.18
 * Time: 16:40
 */

namespace App\Domain\User\Repository;


use App\Domain\Shared\Id;
use App\Domain\User\User;

interface UserRepositoryContract
{
    public function get(Id $userId): ?User;

    public function getAll(): array;

    public function store(User $user): void;

    public function getNextId(): Id;

    public function remove(User $user): void;

}