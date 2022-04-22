<?php

namespace App\Controller;

use App\Entity\Tickets;
use App\Form\TicketFormType;
use App\Repository\TicketsRepository;
use App\Service\FileUploader;
use Symfony\Component\HttpFoundation\File\Exception\NoFileException;
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
    public function show(Request $request, TicketsRepository $ticketsRepository, FileUploader $fileUploader): Response
    {
        $ticket = New Tickets();
        $ticket->setIsHandled(false);
        $ticket->setCreatedAt(new \DateTime());
        $ticket->setClosedAt(new \DateTime());
        $form = $this->createForm(TicketFormType::class, $ticket);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $ticketFile = $form->get('file')->getData();
            if($ticketFile){
                $ticketFileName = $fileUploader->upload($ticketFile);
                $ticket->setFile($ticketFileName);
            } else {
                throw new NoFileException();
            }

            $ticketsRepository->add($ticket);
            return $this->redirectToRoute('index');
        }

        return $this->renderForm('tickets/index.html.twig', [
            'ticket_form' => $form
        ]);
    }
}

// Solutions :  Timeout sur le load du fichier /
// ['secret' => '6LcqloUfAAAAAL3OX-3b4i1Ilicif-IhNtycdYwi']
