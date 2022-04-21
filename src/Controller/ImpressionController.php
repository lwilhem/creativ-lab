<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ImpressionController extends AbstractController
{
    #[Route('/impression', name: 'impression')]
    public function index(): Response
    {
        return $this->render('impression/impression.html.twig', [
            'controller_name' => 'ImpressionController',
        ]);
    }
}
