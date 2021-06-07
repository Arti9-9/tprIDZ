<?php

namespace App\Repository;

use App\Entity\Reliabilities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reliabilities|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reliabilities|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reliabilities[]    findAll()
 * @method Reliabilities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReliabilitiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reliabilities::class);
    }

    // /**
    //  * @return Reliabilities[] Returns an array of Reliabilities objects
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
    public function findOneBySomeField($value): ?Reliabilities
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
