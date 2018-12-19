<?php

namespace App\Repository;

use App\Entity\CompanyActivity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CompanyActivity|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyActivity|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyActivity[]    findAll()
 * @method CompanyActivity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyActivityRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CompanyActivity::class);
    }

//    /**
//     * @return CompanyActivity[] Returns an array of CompanyActivity objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CompanyActivity
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
