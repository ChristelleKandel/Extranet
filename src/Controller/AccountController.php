<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/account')]
class AccountController extends AbstractController
{
    #[Route('', name: 'app_account')]
    public function show_account(): Response
    {
        $user = $this->getUser();
        return $this->render('account/show_account.html.twig', [
            'user' => $user,
        ]);
    }

    //Accès à la fiche salarié et modifications
    #[Route('/edit', name: 'app_account_edit')]
    public function createFiche(Request $request, EntityManagerInterface $em): Response
    {
        //Je rajoute une sécurité pour que les personnes qui rallument mon ordi et sont connectés grâce au cookie rememberMe ne puissent pas accéder à ses fonctions
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        // Je rajoute $user pour pré-remplir le formulaire et associéer les modifications à ce user avant de l'enregistrer
        $user = $this->getUser();
        $form = $this->createForm(UserType::class, $user);
        // dd($form);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { 
            $em->persist($user);
            $em->flush();
            $this->addFlash('success', 'Fiche modifiée avec succès!');
        }
        // dd($user);
        return $this->render('users/ficheSalarie.html.twig', [
            'user' => $user,
            'monForm' => $form->createView(),
        ]);
    }
}
