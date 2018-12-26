<?php
/**
 * Created by PhpStorm.
 * User: mikhail
 * Date: 20.12.18
 * Time: 16:41
 */

namespace App\Infrastructure\Persistence\MySQLDoctrine;


use App\Domain\Shared\Id;
use App\Domain\User\User;
use App\Domain\User\Repository\UserRepositoryContract;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class UserRepository extends ServiceEntityRepository implements UserRepositoryContract
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function get(Id $userId): ?User
    {
        return $this->find($userId);
    }

    public function getAll(): array
    {
        return $this->findAll();
    }

    public function store(User $user): void
    {
        $this->getEntityManager()->persist($user);
        $this->getEntityManager()->flush($user);
    }

    public function remove(User $user): void
    {
        $this->getEntityManager()->remove($user);
        $this->getEntityManager()->flush();
    }

    public function getNextId(): Id
    {
        return Id::generate();
    }
}