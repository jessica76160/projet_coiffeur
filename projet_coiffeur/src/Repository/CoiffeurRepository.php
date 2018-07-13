<?php

namespace App\Repository;

use App\Entity\Coiffeur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Coiffeur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Coiffeur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Coiffeur[]    findAll()
 * @method Coiffeur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoiffeurRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Coiffeur::class);
    }

//    /**
//     * @return Coiffeur[] Returns an array of Coiffeur objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Coiffeur
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
