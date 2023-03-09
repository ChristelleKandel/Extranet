<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UserType;
use App\Data\SearchData;
use App\Form\NewUserType;
use App\Form\SearchFormType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UsersController extends AbstractController
{
    //L'index de TOUS les salariés 
    #[Route('/users', name: 'app_users')]
    public function index(UsersRepository $repo, Request $request, EntityManagerInterface $em): Response
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
    public function createFiche(Users $user, Request $request, EntityManagerInterface $em): Response
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

    //Création d'un nouveau salarié
    #[Route('/users/create', name: 'app_users_create')]
    public function create(Request $request, EntityManagerInterface $em, UsersRepository $UserRepo): Response
    {
        //Création d'un nouvel objet User
        $user = new Users;

        $form = $this->createForm(NewUserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            $em->persist($user);
            $em->flush();
            return $this-> redirectToRoute('app_users');
        }
        return $this->render('users/addUser.html.twig', [
            'monForm' => $form->createView(),
        ]);
    }
}
