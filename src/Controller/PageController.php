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
            '_locale' => $_locale,
        ]);
    }

    #[Route('/contact', name: 'main_contact')]
    public function main_contact(): Response
    {
        return $this->render('page/main_contact.html.twig', [
        ]);
    }

    #[Route('/projects', name: 'main_projects')]
    public function main_projects(): Response
    {
        return $this->render('page/main_projects.html.twig', [
        ]);
    }

    #[Route('/about', name: 'main_about')]
    public function main_about(): Response
    {
        return $this->render('page/main_about.html.twig', [
        ]);
    }
}
