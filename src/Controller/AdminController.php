<?php

namespace App\Controller;

// use Entity\Category;
use App\Entity\Post;
use App\Form\PostType;
use App\Entity\Category;
use App\Form\CategoryType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminController extends AbstractController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    /**
     * @Route("/category/add", name="category_add")
     */
    public function addCategory(Request $request): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Ici "$this" c'est le Controller avec entre-autres "getDoctrine()" pour Methode.
            // $em : pour Entity Manager
            $em = $this->getDoctrine()->getManager();
            $em->persist($category);
            $em->flush();
            return $this->redirectToRoute('admin');
        }

        return $this->render('admin/category/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/post/add", name="post_add")
     */
    public function addPost(Request $request): Response
    {
        $post = new Post();
        $form = $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $post->setUser($this->getUser());
            $post->setActive(false);
            $em = $this->getDoctrine()->getManager();
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('admin/post/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
