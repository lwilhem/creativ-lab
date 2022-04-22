<?php

namespace App\Controller;

use App\Repository\ProjectsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailedPageController extends AbstractController
{
    #[Route('/detailed/{id}', name: 'detailed_page')]
    public function index(ProjectsRepository $projectsRepository, $id): Response
    {
        $data = $projectsRepository->findOneBy(['id' => $id]);

        return $this->render('detailed_page/detailed_page.html.twig', [
            'controller_name' => 'DetailedPageController',
            'data' => $data
        ]);
    }
}
