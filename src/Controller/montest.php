<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class montest extends AbstractController
{
    /**
     * @Route("/montest", name="montest")
     */
    public function index(): Response
    {
        return $this->render('montest/index.html.twig', [
            'controller_name' => 'montest',
            'id' => '',
        ]);
    }

    /**
     * @Route("/montest/{id}", name="test_id", methods={"GET"}, requirements={"id"="\d+"})
     */
    public function test_id($id): Response
    {
        // dd($id);
        return $this->render('montest/index.html.twig', [
            'controller_name' => 'montest avec Id',
            'id' => $id,
        ]);
    }
}
