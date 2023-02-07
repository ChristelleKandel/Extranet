<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\UserType;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UsersController extends AbstractController
{
    #[Route('/users', name: 'app_users')]
    public function index(UsersRepository $repo): Response
    {
        return $this->render('users/listeComplete.html.twig', [
            'users' => $repo->findAll(),
        ]);
    }

    #[Route('/users', name: 'app_users_actuels')]
    public function liste(UsersRepository $repo): Response
    {
        return $this->render('users/listeActuelle.html.twig', [
            'users' => $repo->findBy([‘dateSortie’=>’null‘]),
        ]);
    }
    
    #[Route('/users/{id}/edit', name: 'app_users_fiche', priority:-1)]
    public function createFiche(Users $user, Request $request, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            $em->persist($user);
            $em->flush();
            return $this-> redirectToRoute('app_users');
        }
        return $this->render('users/ficheSalarie.html.twig', [
            'user' => $user,
            'monForm' => $form->createView(),
        ]);
    }

    #[Route('/users/create', name: 'app_users_create')]
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $user = new Users;
        $form = $this->createFormBuilder($user)
        ->add('nom', null, ['attr'=> ['autofocus'=>true]])
        ->add('prenom', null)
        ->add('sexe', null)
        ->add('emailInsercall')
        ->add('dateEntree', BirthdayType::class)
        ->add('pseudo')
        ->add('mdp')
        // ->add('teamName', null)
        ->getForm()
        ;
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            $em->persist($user);
            $em->flush();
            return $this-> redirectToRoute('app_users');
        }
        return $this->render('users/addUser.html.twig', [
            'monFormulaire' => $form->createView(),
        ]);
    }
}