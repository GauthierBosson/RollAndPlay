<?php

namespace App\Repository;

use App\Entity\FichePersonnages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FichePersonnages|null find($id, $lockMode = null, $lockVersion = null)
 * @method FichePersonnages|null findOneBy(array $criteria, array $orderBy = null)
 * @method FichePersonnages[]    findAll()
 * @method FichePersonnages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FichePersonnagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FichePersonnages::class);
    }

//    /**
//     * @return FichePersonnages[] Returns an array of FichePersonnages objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FichePersonnages
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
