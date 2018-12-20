<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 20.12.18
 * Time: 16:40
 */

namespace App\Domain\User;


use App\Domain\Id;

interface UserRepositoryContract
{
    public function get(Id $userId): ?User;

    public function getAll(): array;

    public function store(User $user): void;

    public function getNextId(): Id;

    public function remove(User $user): void;

}