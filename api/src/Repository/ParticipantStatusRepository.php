<?php

namespace App\Repository;

use App\Entity\ParticipantStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ParticipantStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParticipantStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParticipantStatus[]    findAll()
 * @method ParticipantStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParticipantStatusRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ParticipantStatus::class);
    }

//    /**
//     * @return ParticipantStatus[] Returns an array of ParticipantStatus objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ParticipantStatus
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
