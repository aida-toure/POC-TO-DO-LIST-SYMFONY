<?php

namespace App\Controller;

use Symfony\Bridge\Doctrine\Form\Type\DoctrineType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Task;
use App\Entity\User;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ManagerRegistry $doctrine): Response
    {   
        # Aïda : this line below is the "read" from CRUD operations
        $tasks = $doctrine->getRepository(Task::class)->findAll();
        # Aïda : create a user class to get the name
        $user = new User();
        $user = $user->getUser();
        # Aïda : render home page
        return $this->render('products/home.html.twig', [
            'controller_name' => 'HomeController',
            # Aïda = sending datas to HTML
            'user' => $user,
            'tasks' => $tasks,
        ]);
    }
    
}
