<?php

namespace App\Repository;

use App\Entity\Team;
use App\Entity\Users;
use App\Entity\Qualifications;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\Pagination\PaginationInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Users>
 *
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Users::class);
    }

    public function save(Users $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Users $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    // Fonction de tri des users par ordre alphabétique
    /**
    * @return Users[] Returns an array of Users objects
    */
    public function findAllUsersByNameAscQueryBuilder(): QueryBuilder{
        return $this-> createQueryBuilder('u')
            ->orderBy('u.nom', 'ASC');
    }

    // Fonction qui retourne les salariés en fonction des résultats de recherche
    /**
    * @return Users[] Returns an array of Users objects
    */

    // public function findFilter(SearchData $search): PaginationInterface
    public function findFilter(SearchData $search): array

    {
        $query = $this->createQueryBuilder('u')
            ->select('q', 'u')->join('u.qualification', 'q');
            //on utilise la jointure entre les qualifications et les users poru ne pas faire double emploi
        if(!empty($search->searchBar)){
            $query = query->andWhere('u.name LIKE :q')
                ->setParameter('q', "%{$search->searchBar}%");
        }

        if(!empty($search->qualification)){
            $query = $query->andWhere('u.qualification = :qualif')
                ->setParameter('qualif', $qualification)
                ->orderBy('u.prenom', 'ASC')
            ;
        }
        if(!empty($search->teamName)){
            $query = $query->andWhere('u.teamName = :team')
                ->setParameter('team', $teamName)
                ->orderBy('u.prenom', 'ASC')
            ;
        }
        if(!empty($search->prenom)){
            $query = $query->andWhere('u.prenom = :prenom')
                ->setParameter('prenom', $prenom)
            ;
        }
        if(!empty($search->nom)){
            $query = $query->andWhere('u.nom = :nom')
                ->setParameter('nom', $nom)
                ->orderBy('u.nom', 'ASC')
            ;
        }
        return $query->getQuery()->getResult();
        // return $this->paginator->paginate($query, $search->page,9);
    }

    public function findByQualification(Qualifications $qualification): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.qualification = :qualif')
            ->setParameter('qualif', $qualification)
            ->orderBy('u.prenom', 'ASC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    public function findByTeamName(Team $team): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.teamName = :team')
            ->setParameter('team', $team)
            ->orderBy('u.name', 'ASC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return Users[] Returns an array of Users objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Users
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
