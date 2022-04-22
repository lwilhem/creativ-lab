<?php

namespace App\Controller;


use App\Repository\PostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ElectroniqueController extends AbstractController
{
    #[Route('/electronique', name: 'electronique')]
    public function index(PostsRepository $postsRepository): Response
    {

        $post = $postsRepository->findBy([],['createdAt'=>'ASC']);

        return $this->render('electronique/electronique.html.twig', [
            'controller_name' => 'ElectroniqueController',
            'posts' => $post,
        ]);
    }
}
