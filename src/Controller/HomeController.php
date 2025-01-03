<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'page_title' => 'test',
        ]);
    }
    #[Route('/home', name: 'home-base')]
    public function home(): Response
    {
        return $this->index();
    }
}