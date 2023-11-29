<?php

namespace App\Repository;

use App\Entity\VideoFolder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VideoFolder>
 *
 * @method VideoFolder|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoFolder|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoFolder[]    findAll()
 * @method VideoFolder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoFolderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoFolder::class);
    }

//    /**
//     * @return VideoFolder[] Returns an array of VideoFolder objects
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

//    public function findOneBySomeField($value): ?VideoFolder
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
