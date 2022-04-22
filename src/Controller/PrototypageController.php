<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PrototypageController extends AbstractController
{
    #[Route('/prototypage', name: 'prototypage')]
    public function index(PostsRepository $postsRepository): Response
    {

        $post = $postsRepository->findBy([],['createdAt'=>'ASC']);

        return $this->render('prototypage/prototypage.html.twig', [
            'controller_name' => 'PrototypageController',
            'posts' => $post,
        ]);
    }
}
