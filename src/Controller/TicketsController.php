<?php

namespace App\Controller;

use App\Entity\Tickets;
use App\Form\TicketsType;
use App\Repository\TicketsRepository;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;


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
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $ticket = new Tickets();
        $form = $this->createForm(TicketsType::class, $ticket);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            /** @var UploadedFile $ticketFile */
            $ticketFile = $form->get('file')->getData();

            if($ticketFile){
                $originalFilename = pathinfo($ticketFile->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$ticketFile->guessExtension();

                try{
                    $ticketFile->move(
                        $this->getParameter('ticket_directory'),
                        $newFilename
                    );
                } catch (FileException $e){
                    throw new FileException($e);
                }
                $ticket->setFile($newFilename);
            }
            return $this->redirectToRoute('homepage');
        }

        return $this->renderForm('tickets/index.html.twig', [
            'form' => $form,
        ]);
    }

}
