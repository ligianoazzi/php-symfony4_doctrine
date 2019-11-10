<?php

namespace App\Repository;

use App\Entity\Raca;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Raca|null find($id, $lockMode = null, $lockVersion = null)
 * @method Raca|null findOneBy(array $criteria, array $orderBy = null)
 * @method Raca[]    findAll()
 * @method Raca[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RacaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Raca::class);
    }

    // /**
    //  * @return Raca[] Returns an array of Raca objects
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
    public function findOneBySomeField($value): ?Raca
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
