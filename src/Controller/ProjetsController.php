<?php

namespace App\Controller;

use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetsController extends AbstractController
{
    #[Route('/projets', name: 'projets')]
    public function index(ProjectsRepository $projectsRepository): Response
    {
        $elec = $projectsRepository->findBy(['type' => 1]);
        $proto = $projectsRepository->findBy(['type' => 2]);
        $print = $projectsRepository->findBy(['type' => 3]);
        return $this->render('projets/projets.html.twig', [
            'controller_name' => 'ProjetsController',
            'data_elec' => $elec,
            'data_proto' => $proto,
            'data_print' => $print,
        ]);
    }
}
