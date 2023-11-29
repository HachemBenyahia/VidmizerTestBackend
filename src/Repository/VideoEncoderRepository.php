<?php

namespace App\Repository;

use App\Entity\VideoEncoder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VideoEncoder>
 *
 * @method VideoEncoder|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoEncoder|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoEncoder[]    findAll()
 * @method VideoEncoder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoEncoderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoEncoder::class);
    }

//    /**
//     * @return VideoEncoder[] Returns an array of VideoEncoder objects
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

//    public function findOneBySomeField($value): ?VideoEncoder
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
