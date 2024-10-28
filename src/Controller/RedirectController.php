<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class RedirectController extends AbstractController
{
    #[Route('/')]
    public function redirectToLocale(Request $request): RedirectResponse
    {
        //Obtain lang cookie value
        $cookie = $request->cookies->get('lang_cookie','es');

        // Create redirect response
        return $this->redirectToRoute('main_index', ['_locale' => $cookie]);
    }

    #[Route('/set_lang/{lang}', name: 'set_lang')]
    public function setLang(string $lang): RedirectResponse
    {
        // Create lang cookie with the new value
        $cookie = new Cookie('lang_cookie', $lang, time() + 3600 * 24 * 30);

        // Create redirect response
        $response = $this->redirectToRoute('main_index', ['_locale' => $lang]);

        // Establish cookie in response
        $response->headers->setCookie($cookie);
        dump($response);

        return $response;
    }
}
