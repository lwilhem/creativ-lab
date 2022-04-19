<?php

namespace App\Controller;

use App\Entity\Tickets;
use App\Form\TicketsType;
use App\Repository\TicketsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TicketsController extends AbstractController
{
    #[Route('/tickets', name: 'tickets')]
    public function index(TicketsRepository $ticketsRepository): Response
    {
        return $this->render('tickets/index.html.twig', [
            'controller_name' => 'TicketsController',
        ]);
    }

    #[Route('/tickets', name: 'tickets')]
    public function new(Request $request): Response
    {
        $ticket = new Tickets();
        $form = $this->createForm(TicketsType::class, $ticket);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $ticket = $form->getData();
            return $this->redirectToRoute('homepage');
        }

        return $this->renderForm('tickets/index.html.twig', [
            'test_form' => $form,
        ]);
    }

}
