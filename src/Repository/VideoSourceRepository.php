<?php

namespace App\Repository;

use App\Entity\VideoSource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VideoSource>
 *
 * @method VideoSource|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoSource|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoSource[]    findAll()
 * @method VideoSource[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoSourceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoSource::class);
    }

//    /**
//     * @return VideoSource[] Returns an array of VideoSource objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VideoSource
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
