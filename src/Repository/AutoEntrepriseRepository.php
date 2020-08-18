<?php

namespace App\Repository;

use App\Entity\AutoEntreprise;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AutoEntreprise|null find($id, $lockMode = null, $lockVersion = null)
 * @method AutoEntreprise|null findOneBy(array $criteria, array $orderBy = null)
 * @method AutoEntreprise[]    findAll()
 * @method AutoEntreprise[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AutoEntrepriseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AutoEntreprise::class);
    }

    // /**
    //  * @return AutoEntreprise[] Returns an array of AutoEntreprise objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AutoEntreprise
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
