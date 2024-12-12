<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Task;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;


#[Route('/task')]
class CRUDController extends AbstractController
{
    # Aïda : Not sure if it's the best practice, but I put CRUD methods here
    #[Route('/create', name: 'task_create')]
    public function create(Request $request, ManagerRegistry $doctrine): Response{
        if($request->isMethod("POST")){
            # Aïda : This is where the request are catched
            $title = $request->request->get('title');
            $description = $request->request->get('description');
            # Aïda : The requests are used to set somes attrbutes of ne new Task
            $task = new Task;
            $task->setTitle($title);
            $task->setDescription($description);
            $task->setStatus(false);
            # Aïda : doctrine will add the task from database
            $entityManager = $doctrine->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
            # Aïda : Once the row is created this line below will redirect to the home page
            return $this->redirectToRoute('app_home');
        }
        return $this->render('products/home.html.twig');
    }
    
    # Aïda : /!\ Read function is already whritten on the HomeController, there is no read method here. 
    
    # Aïda : Unfortunatly, i could'nt figure it out to how i can modify the html container with home controller
    # So update function will never be used 
    #[Route('/update', name: 'task_update')]
    public function update(Task $task, Request $request, ManagerRegistry $doctrine): Response{
        if ($request->isMethod('POST')){
            $task->setTitle($request->request->get('title'));
            $task->setDescription($request->request->get('description'));

            $entityManager = $doctrine->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

    }

    #[Route('/delete/{id}', name: 'task_delete', methods: ['POST'])]
    public function delete(ManagerRegistry $doctrine, Request $request, $id): Response{
        if ($request->isMethod('POST')){
            $entityManager = $doctrine->getManager();
            $task = $entityManager->getRepository(Task::class)->find($id);
            # Aïda : doctrine will remove the task from database
            if ($task){
                $entityManager->remove($task);
                $entityManager->flush();
            }
            
        }
        return $this->redirectToRoute('app_home');
    }
}
