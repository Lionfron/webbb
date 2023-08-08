<?php

namespace App\Controller;

use App\Entity\Category;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'app_login')]

     public function index(AuthenticationUtils $authenticationUtils, ManagerRegistry $doctrine): Response
{
            $categories = $doctrine->getRepository(Category::class)->findAll();
             // get the login error if there is one
             $error = $authenticationUtils->getLastAuthenticationError();

             // last username entered by the user
             $lastUsername = $authenticationUtils->getLastUsername();

          return $this->render('login/index.html.twig', [
                           'categories'    => $categories,
                           'last_username' => $lastUsername,
                           'error'         => $error,
          ]);
    }
}
