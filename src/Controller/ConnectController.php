<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ConnectController extends AbstractController
{
    # Aïda : Render the connect page, this is the first page to show
    #[Route('/', name: 'app_connect')]
    public function index(): Response
    {
        return $this->render('products/connect.html.twig', [
            'controller_name' => 'ConnectController',
        ]);
    }
}
