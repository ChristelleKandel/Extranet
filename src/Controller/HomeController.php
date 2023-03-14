<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $user = $this->getUser();
        $role = $user->getRoles();
        // dd(in_array('ROLE_ADMIN', $role));
        if (in_array('ROLE_ADMIN', $role)){
            return $this->render('home/index.html.twig');
        }else{
            return $this->render('account/show_account.html.twig', [
                'user' => $user,
            ]);
        }
        // return $this->render('home/index.html.twig');
    }

    #[Route('/home/rdv', name: 'app_home_rdv')]
    public function rdv(): Response
    {
        return $this->render('home/rdv.html.twig');
    }
}
