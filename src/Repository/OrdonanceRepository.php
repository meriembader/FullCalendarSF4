<?php

namespace App\Repository;

use App\Entity\Ordonance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ordonance|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ordonance|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ordonance[]    findAll()
 * @method Ordonance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrdonanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ordonance::class);
    }

    // /**
    //  * @return Ordonance[] Returns an array of Ordonance objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ordonance
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
