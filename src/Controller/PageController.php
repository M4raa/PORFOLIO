<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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

    #[Route('/send_mail', name: 'main_sendMail', methods: ['POST'])]
    public function main_sendMail(Request $request, MailerInterface $mailer): JsonResponse
    {
        // Obtain data sent through ajax
        $data = json_decode($request->getContent(), true);
        $fname = $data['fname'] ?? '';
        $lnames = $data['lnames'] ?? '';
        $email = $data['email'] ?? '';
        $message = $data['message'] ?? '';

        // Basic data validation
        if (empty($fname) || empty($lnames) || empty($email) || empty($message)) {
            return new JsonResponse(['success' => false, 'message' => 'Missing data'], 400);
        }

        // Email validation
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return new JsonResponse(['success' => false, 'message' => 'Email invalid'], 400);
        }

        // Create the email object
        $emailToSend = (new Email())
            ->from('m28007346@gmail.com')  // or use a system email like system@domain.com
            ->to('m4araa@proton.me')
            ->subject('Mensaje de ' . $fname . ' ' . $lnames)
            ->text(sprintf("Email: %s\r\nMessage: %s", $email, $message));

        try {
            $mailer->send($emailToSend);
            return new JsonResponse(['success' => true, 'message' => 'Mail sent correctly']);
        } catch (\Exception $e) {
            return new JsonResponse(['success' => false, 'message' => 'Error sending the mail: ' . $e->getMessage()], 500);
        }
    }

}
