<?php

namespace App\Repository;

use App\Entity\OptionsDevis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method OptionsDevis|null find($id, $lockMode = null, $lockVersion = null)
 * @method OptionsDevis|null findOneBy(array $criteria, array $orderBy = null)
 * @method OptionsDevis[]    findAll()
 * @method OptionsDevis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OptionsDevisRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, OptionsDevis::class);
    }

//    /**
//     * @return OptionsDevis[] Returns an array of OptionsDevis objects
//     */
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
    public function findOneBySomeField($value): ?OptionsDevis
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
