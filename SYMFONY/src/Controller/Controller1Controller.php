<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Controller1Controller extends AbstractController
{
    #[Route('/test', name: 'app_controller1')]
    public function index(): Response
    {
        return $this->render('test/test.html.twig', [
            'controller_name' => 'BigBoss',
        ]);
    }
}
