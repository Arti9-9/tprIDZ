<?php

namespace App\Repository;

use App\Entity\FunctionalUnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FunctionalUnit|null find($id, $lockMode = null, $lockVersion = null)
 * @method FunctionalUnit|null findOneBy(array $criteria, array $orderBy = null)
 * @method FunctionalUnit[]    findAll()
 * @method FunctionalUnit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FunctionalUnitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FunctionalUnit::class);
    }

    // /**
    //  * @return FunctionalUnit[] Returns an array of FunctionalUnit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FunctionalUnit
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
