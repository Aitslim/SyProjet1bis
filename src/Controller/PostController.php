<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(): Response
    {
        return $this->render('post/index.html.twig', [
            'bg_image' => "home-bg.jpg",
        ]);
    }

    /**
     * @Route("/post/{id}", name="postview", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function view($id): Response
    {
        return $this->render('post/postview.html.twig', [
            'post' => [
                'title' => 'Le titre du Post : ' . $id,
                'content' => 'Le Content du Post',
            ],
            'bg_image' => "post-bg.jpg",
        ]);
    }
}
