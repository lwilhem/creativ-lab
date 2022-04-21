<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrototypageController extends AbstractController
{
    #[Route('/prototypage', name: 'prototypage')]
    public function index(): Response
    {
        return $this->render('prototypage/prototypage.html.twig', [
            'controller_name' => 'PrototypageController',
        ]);
    }
}
