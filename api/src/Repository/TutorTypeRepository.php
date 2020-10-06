<?php

namespace App\Repository;

use App\Entity\TutorType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TutorType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TutorType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TutorType[]    findAll()
 * @method TutorType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TutorTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TutorType::class);
    }

    // /**
    //  * @return TutorType[] Returns an array of TutorType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TutorType
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
