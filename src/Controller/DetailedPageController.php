<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DetailedPageController extends AbstractController
{
    #[Route('/detailed/page', name: 'detailed_page')]
    public function index(): Response
    {
        return $this->render('detailed_page/detailed_page.html.twig', [
            'controller_name' => 'DetailedPageController',
        ]);
    }
}
