<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class testController extends AbstractController
{
    #[Route('/test', name: 'test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'page_title' => 'test',
        ]);
    }
    #[Route('/test/number')]
    public function number():Response
    {
        $number = 1234;
        return $this->render('test/numero.html.twig', [
            'number' => $number,
        ]);
    }
}