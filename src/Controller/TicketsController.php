<?php
// src/Controller/ProjectController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Project2;
use App\Entity\Tickets;
class TicketsController extends AbstractController
{
  /**
* @Route("/task", name="project_show2")
*/
     public function showproject()
     {
         $project_id=1;
         $repository = $this->getDoctrine()->getRepository(Project2::class);
         $project = $repository->find($project_id);
         $repository = $this->getDoctrine()->getRepository(Tickets::class);
         $tickets = $repository->findBy([
    'project_id' => 1,
]);
          return $this -> render ( 'project/showtask.html.twig' , [
            'project' => $project ,  'tickets' => $tickets
        ]);
     }
}
