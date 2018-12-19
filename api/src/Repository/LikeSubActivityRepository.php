<?php

namespace App\Repository;

use App\Entity\LikeSubActivity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LikeSubActivity|null find($id, $lockMode = null, $lockVersion = null)
 * @method LikeSubActivity|null findOneBy(array $criteria, array $orderBy = null)
 * @method LikeSubActivity[]    findAll()
 * @method LikeSubActivity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LikeSubActivityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LikeSubActivity::class);
    }

//    /**
//     * @return LikeSubActivity[] Returns an array of LikeSubActivity objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LikeSubActivity
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
