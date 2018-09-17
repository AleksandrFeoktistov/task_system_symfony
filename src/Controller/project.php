<?php
// src/Controller/ProjectController.php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Project2;
class Project2Controller extends AbstractController
{
  /**
* @Route("/2", name="project_show2")
*/
     public function showproject()
     {
       $repository = $this->getDoctrine()->getRepository(Project2::class);
       $project = $repository->findall();
       return $this->render('project/show.html.twig', [
           'project' => $project,
       ]);
     }
}
