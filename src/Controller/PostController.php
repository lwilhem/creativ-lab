<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post/{id}', name: 'single_post')]
    public function index(PostsRepository $postsRepository, $id): Response
    {
        $post = $postsRepository->findOneBy(['id' => $id]);

        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'data' => $post
        ]);
    }
}
