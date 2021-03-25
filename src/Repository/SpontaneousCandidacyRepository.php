<?php

namespace App\Repository;

use App\Entity\SpontaneousCandidacy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpontaneousCandidacy|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpontaneousCandidacy|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpontaneousCandidacy[]    findAll()
 * @method SpontaneousCandidacy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpontaneousCandidacyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpontaneousCandidacy::class);
    }

    // /**
    //  * @return SpontaneousCandidacy[] Returns an array of SpontaneousCandidacy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpontaneousCandidacy
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
