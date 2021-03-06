<?php

namespace App\Repository;

use App\Entity\Offer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Migrations\Query\Query;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Offer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Offer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Offer[]    findAll()
 * @method Offer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OfferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Offer::class);
    }

    /**
     * @return Offer[] 
     * Returns an array of Offer objects
     */
    public function findLatest(): array
    {
        return $this->createQueryBuilder('o')
            ->where('o.isActive = true')
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
    }


    /**
    * @return Query
    */
    
    public function findAllActiveQuery()
    {
        return $this->createQueryBuilder('o')
            ->Where('o.isActive = true')
            ->orderBy('o.id', 'DESC')
            ->getQuery();
    }
    

    /*
    public function findOneBySomeField($value): ?Offer
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
