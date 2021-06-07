<?php

namespace App\Repository;

use App\Entity\TechicalIndexs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TechicalIndexs|null find($id, $lockMode = null, $lockVersion = null)
 * @method TechicalIndexs|null findOneBy(array $criteria, array $orderBy = null)
 * @method TechicalIndexs[]    findAll()
 * @method TechicalIndexs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechicalIndexsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TechicalIndexs::class);
    }

    // /**
    //  * @return TechicalIndexs[] Returns an array of TechicalIndexs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TechicalIndexs
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
