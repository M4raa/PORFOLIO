<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/{_locale}', requirements: ['_locale' => 'en|es'])]
class PageController extends AbstractController
{
    #[Route('/', name: 'main_index')]
    public function main_index(string $_locale): Response
    {
        return $this->render('page/main_index.html.twig', [
            'controller_name' => 'PageController',
            '_locale' => $_locale,
        ]);
    }

    #[Route('/contact', name: 'main_contact')]
    public function main_contact(): Response
    {
        return $this->render('page/main_contact.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/login', name: 'main_login')]
    public function main_login(): Response
    {
        return $this->render('page/main_login.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/logout', name: 'main_logout')]
    public function main_logout(): Response
    {
        return $this->render('page/main_login.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }
}
