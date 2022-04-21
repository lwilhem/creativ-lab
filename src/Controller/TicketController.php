<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TicketController extends AbstractController
{
    #[Route('/ticket', name: 'ticket')]
    public function index(): Response
    {
        return $this->render('ticket/ticket.html.twig', [
            'controller_name' => 'TicketController',
        ]);
    }
}
