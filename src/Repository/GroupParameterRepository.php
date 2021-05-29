<?php

namespace App\Repository;

use App\Entity\GroupParameter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GroupParameter|null find($id, $lockMode = null, $lockVersion = null)
 * @method GroupParameter|null findOneBy(array $criteria, array $orderBy = null)
 * @method GroupParameter[]    findAll()
 * @method GroupParameter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroupParameterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GroupParameter::class);
    }

    // /**
    //  * @return GroupParameter[] Returns an array of GroupParameter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GroupParameter
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
