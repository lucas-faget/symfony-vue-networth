<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * Find similar profiles to the given user based on tags.
     *
     * @param User $user
     * @return array
     */
    public function findSimilarProfiles(User $user): array
    {
        // return $this->createQueryBuilder('u')
        //     ->join('u.tags', 't')
        //     ->andWhere('t IN (:userTags)')
        //     ->andWhere('u.id != :userId')
        //     ->setParameter('userTags', $user->getTags())
        //     ->setParameter('userId', $user->getId())
        //     ->getQuery()
        //     ->getResult();

        return $this->createQueryBuilder('u')
            ->select('u', 'COUNT(t.id) as HIDDEN tagCount')
            ->join('u.tags', 't')
            ->andWhere('t IN (:userTags)')
            ->andWhere('u.id != :userId')
            ->groupBy('u.id')
            ->orderBy('tagCount', 'DESC')
            ->setParameter('userTags', $user->getTags())
            ->setParameter('userId', $user->getId())
            ->getQuery()
            ->getResult();
    }
}
