<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;


class UserController extends AbstractController
{
    # Aïda : function used to set the name user
    #[Route('/user', name: 'user_name')]
    public function create(Request $request, ManagerRegistry $doctrine): Response{
        if ($request-> isMethod('POST')){
            $user_name = $request->request->get('user');
            # Aïda : create a user class and set the name
            $user = new User();
            $user->setUser($user_name);
             
            return $this->redirectToRoute('app_home');
        }
    }

}
