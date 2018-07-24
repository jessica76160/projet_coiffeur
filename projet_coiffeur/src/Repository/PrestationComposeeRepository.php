<?php

namespace App\Repository;

use App\Entity\PrestationComposee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method PrestationComposee|null find($id, $lockMode = null, $lockVersion = null)
 * @method PrestationComposee|null findOneBy(array $criteria, array $orderBy = null)
 * @method PrestationComposee[]    findAll()
 * @method PrestationComposee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PrestationComposeeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, PrestationComposee::class);
    }

//    /**
//     * @return PrestationComposee[] Returns an array of PrestationComposee objects
//     */
    /*
    public function findById($id)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    
    public function findOneById($id): ?PrestationComposee
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.id = :val')
            ->setParameter('val', $id)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    

    public function findByGenreType($genre,$type)
    {
        if($genre!="" and $type!=""){

            return $this->createQueryBuilder('p')
                ->select('p.id')
                ->addSelect('p.nom')
                ->andWhere('p.genre = :genre or p.genre= :commun')
                ->andWhere('p.type_cheveux = :type or p.type_cheveux= :commun')
                ->setParameter('genre', $genre)
                ->setParameter('type', $type)
                ->setParameter('commun', 'commun')
                ->getQuery()
                ->getResult()
            ;

        }elseif($genre=="" and $type!=""){

            return $this->createQueryBuilder('p')
                ->select('p.id')
                ->addSelect('p.nom')
                ->andWhere('p.type_cheveux = :type or p.type_cheveux= :commun')
                ->setParameter('type', $type)
                ->setParameter('commun', 'commun')
                ->getQuery()
                ->getResult()
            ;

        }elseif($genre!="" and $type==""){

            return $this->createQueryBuilder('p')
                ->select('p.id')
                ->addSelect('p.nom')
                ->andWhere('p.genre = :genre  or p.genre= :commun')
                ->setParameter('genre', $genre)
                ->setParameter('commun', 'commun')
                ->getQuery()
                ->getResult()
            ;

        }
    }
}
