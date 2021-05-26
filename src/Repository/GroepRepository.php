<?php

namespace App\Repository;

use App\Entity\Groep;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Groep|null find($id, $lockMode = null, $lockVersion = null)
 * @method Groep|null findOneBy(array $criteria, array $orderBy = null)
 * @method Groep[]    findAll()
 * @method Groep[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GroepRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Groep::class);
    }

    // /**
    //  * @return Groep[] Returns an array of Groep objects
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
    public function findOneBySomeField($value): ?Groep
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
