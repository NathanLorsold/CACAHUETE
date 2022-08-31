<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/index', name: 'app_test')]
    public function new(Request $request): Response

    {
        // création du formulaire
        $form = $this->createForm(ProductsType::class, $product);
        // lecture du formulaire
        $form->handleRequest($request);
        return $this->render('products/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }
    // public function index(): Response
    // {
    //     return $this->render('test/index.html.twig', [
    //         'controller_name' => 'Boss',
    //     ]);
    // }
}
