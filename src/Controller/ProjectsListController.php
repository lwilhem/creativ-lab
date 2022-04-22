<?php

namespace App\Controller;

use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjectsListController extends AbstractController
{
    #[Route('/projects/list', name: 'projects_list')]
    public function index(ProjectsRepository $projectsRepository): Response
    {
        $allProjects = $projectsRepository->findAll();

        return $this->render('projects_list/index.html.twig', [
            'controller_name' => 'ProjectsListController',
            'data' => $allProjects
        ]);
    }
}
