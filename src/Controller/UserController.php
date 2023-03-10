<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Data\SearchData;
use App\Form\NewUserType;
use App\Form\SearchFormType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    //L'index de TOUS les salariés 
    #[Route('/users', name: 'app_users')]
    /**
     * @Security("is_granted('ROLE_ADMIN')", message="Vous n'êtes pas autorisé(e) à accéder à cette page")
     */
    public function index(UserRepository $repo, Request $request, EntityManagerInterface $em): Response
    { 
        //Création d'un nouvel objet Data
        $data = new SearchData; 
        //création du formulaire de filtre à partir des Data
        $form = $this->createForm(SearchFormType::class, $data);
        //Si on soumet le filtre
        $form->handleRequest($request);
        $usersListe = $repo->findFilter($data);
        if ($form->isSubmitted() && $form->isValid()) { 
            return $this->render('users/liste.html.twig', [
                'FilterForm' => $form->createView(),
                'users' => $usersListe,
            ]);
        }
        // par défaut retourne la liste de tous les salariés triés par date d’arrivée descendante.
        return $this->render('users/liste.html.twig', [
            'FilterForm' => $form->createView(),
            'users' => $repo->findBy(['dateSortie' => null], ['dateEntree' => 'desc']),
        ]);
    }
    
    //Création de la fiche salarié et modifications
    #[Route('/users/{id}/edit', name: 'app_users_fiche', priority:-1)]
    /**
     * @Security("is_granted('ROLE_ADMIN')", message="Vous n'êtes pas autorisé(e) à accéder à cette page")
     */
    public function createFiche(User $user, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(UserType::class, $user);
        // dd($form);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Fiche modifiée avec succès!');
        }
        return $this->render('users/ficheSalarie.html.twig', [
            'user' => $user,
            'monForm' => $form->createView(),
        ]);
        //    // OU on utilise renderForm qui fait directement le createView():
        // return $this->renderForm('users/ficheSalarie.html.twig', [
        //     'user' => $user,
        //     'monForm' => $form
        // ]);
    }

    //L'index de TOUTES les demandes de congés 
    #[Route('/users/conges', name: 'app_users_conges')]
    /**
     * @Security("is_granted('ROLE_ADMIN')", message="Vous n'êtes pas autorisé(e) à accéder à cette page")
     */
    // A FAIRE ENTITY + REPOSITORY CONGES ET LES FAIRE APPARAITRE ICI ET TEMPLATE TABLEAU
    // public function demandeConges(CongesRepository $repo, Request $request, EntityManagerInterface $em): Response
    public function demandeConges(): Response
    { 
    // par défaut retourne la liste de toutes les demandes de congés triées par date d’arrivée descendante.
    return $this->render('users/conges.html.twig');
    // return $this->render('users/conges.html.twig', [
    //     'users' => $repo->findBy(['dateSortie' => null], ['dateEntree' => 'desc']),
    // ]);
    }

    //Création d'un nouveau salarié, NON: géré par registrationController

}
