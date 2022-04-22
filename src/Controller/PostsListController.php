<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostsListController extends AbstractController
{
    #[Route('/posts', name: 'posts_list')]
    public function index(PostsRepository $postsRepository): Response
    {
        $postList = $postsRepository->findAll();

        return $this->render('posts_list/index.html.twig', [
            'controller_name' => 'PostsController',
            'posts' => $postList
        ]);
    }
}
