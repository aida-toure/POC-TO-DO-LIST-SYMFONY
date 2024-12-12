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
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(SessionInterface $session,ManagerRegistry $doctrine, Request $request): Response
    {   
        # Aïda : this line below is the "read" from CRUD operations
        $tasks = $doctrine->getRepository(Task::class)->findAll();
        $user = new User();
        # Aïda : if user put his name on connect page then the if condition below will create a new user
        if ($request-> isMethod('POST')){
            $user_name = $request->request->get('user');

            $user->setUser($user_name);
            # Aïda : This part is important, because there are seraval pages and, operations necessite to load the page
            # the name user will be saved thanks to SessionInterface service
            $session->set('user', $user);
        }
        # Aïda : if-else conditiosn below will check if there is a user registered on session. 
        # If this is the case, get the name from session, if not the case (the user came from connect page) then the session set an user from object
        if ($session->has('user')){
            $user = $session->get('user');
        } else {
                $user->getUser();
                $session->set('user', $user);
        }
        # Aïda : show the page
        return $this->render('products/home.html.twig', [
            'controller_name' => 'HomeController',
            # Aïda = sending datas to HTML
            'user' => $user->getUser(),
            'tasks' => $tasks,
        ]);
    }

}