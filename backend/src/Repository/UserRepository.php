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
        return $this->createQueryBuilder('u')
            ->join('u.tags', 't')
            ->andWhere('t IN (:userTags)')
            ->andWhere('u.id != :userId')
            ->groupBy('u.id')
            ->orderBy('COUNT(t.id)', 'DESC')
            ->addOrderBy('SIZE(u.tags)', 'ASC')
            ->setParameter('userTags', $user->getTags())
            ->setParameter('userId', $user->getId())
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    /**
     * Find suggested profiles to the given user.
     *
     * @param User $user
     * @return array
     */
    public function findSuggestedProfiles(User $user): array
    {
        return $this->createQueryBuilder('u')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }
}
