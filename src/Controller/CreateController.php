<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Tasks;
use Doctrine\Persistence\ManagerRegistry;


class CreateController extends AbstractController
{
    # Aïda : render the create page. This page is about creating a task
    #[Route('/create', name: 'app_create')]
    public function index(): Response
    {
        return $this->render('products/create.html.twig', [
            'controller_name' => 'CreateController',
        ]);
    }
}
