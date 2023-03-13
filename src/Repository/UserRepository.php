<?php

namespace App\Repository;

use App\Entity\Team;
use App\Entity\User;
use App\Data\SearchData;
use App\Entity\Qualifications;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function save(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);

        $this->save($user, true);
    }

    
    // Fonction de tri des users par ordre alphabétique
    /**
    * @return User[] Returns an array of Users objects
    */
    public function findAllUsersByNameAscQueryBuilder(): QueryBuilder{
        return $this-> createQueryBuilder('u')
            ->orderBy('u.nom', 'ASC');
    }

    // Fonction qui retourne les salariés en fonction des résultats de recherche
    /**
    * @return User[] Returns an array of Users objects
    */

    // public function findFilter(SearchData $search): PaginationInterface
    public function findFilter(SearchData $search): array

    {
        $query = $this->createQueryBuilder('u')
            ->select('q', 'u')->join('u.qualification', 'q');
            //on utilise la jointure entre les qualifications et les users pour ne pas faire double emploi

        if(!empty($search->searchBar)){
            $query = $query->andWhere('u.prenom LIKE :searchBar')
                ->setParameter('searchBar', "%{$search->searchBar}%");
        }

        if(!empty($search->qualif)){
            $query = $query->andWhere('q.id IN (:qualif)')
                ->setParameter('qualif', $search->qualif)
                ->orderBy('u.prenom', 'ASC')
            ;
        }
        if(!empty($search->team)){
            $query = $query
                ->select('u', 't')->join('u.teamName', 't')
                ->andWhere('t.id IN (:team)')
                ->setParameter('team', $search->team)
                ->orderBy('u.prenom', 'ASC')
            ;
        }
        if(!empty($search->enPoste)){
            $query = $query
                ->andWhere('u.dateSortie IS null')
                ->orderBy('u.prenom', 'ASC')
            ;
        }
        return $query->getQuery()->getResult();
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
//     * @return User[] Returns an array of User objects
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

//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
