<?php

namespace App\Repository;

use App\Entity\ReliabilitiesIGrP;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ReliabilitiesIGrP|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReliabilitiesIGrP|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReliabilitiesIGrP[]    findAll()
 * @method ReliabilitiesIGrP[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReliabilitiesIGrPRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReliabilitiesIGrP::class);
    }

    // /**
    //  * @return ReliabilitiesIGrP[] Returns an array of ReliabilitiesIGrP objects
    //  */
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
    public function findOneBySomeField($value): ?ReliabilitiesIGrP
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
