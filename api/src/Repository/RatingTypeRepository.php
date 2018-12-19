<?php

namespace App\Repository;

use App\Entity\RatingType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method RatingType|null find($id, $lockMode = null, $lockVersion = null)
 * @method RatingType|null findOneBy(array $criteria, array $orderBy = null)
 * @method RatingType[]    findAll()
 * @method RatingType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RatingTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, RatingType::class);
    }

//    /**
//     * @return RatingType[] Returns an array of RatingType objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RatingType
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
