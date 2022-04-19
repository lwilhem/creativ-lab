<?php

namespace App\Controller;

use App\Entity\Tickets;
use App\Form\TicketsType;
use App\Repository\TicketsRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TicketsController extends AbstractController
{
    public function new(Request $request){
        $ticket = new Tickets();
        $ticket->setFile('test');
        $ticket->setOpenedBy('ayo');
        $ticket->setCreatedAt(new \DateTime('d-m-y'));

        $form = $this->createForm(TicketsType::class);


        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('homepage');
        }

        return $this->renderForm('task/new.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/tickets', name: 'tickets_submit')]
    public function index(TicketsRepository $ticketsRepository): Response
    {
        return $this->render('tickets/index.html.twig', [
            'controller_name' => 'TicketsController',
        ]);
    }
}
