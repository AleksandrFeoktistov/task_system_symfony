<?php

namespace App\Controller;

use App\Entity\Project2;
use App\Entity\Tickets;
use App\Form\Project2Type;
use App\Repository\Project2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


/**
 * @Route("/project2")
 */
class ProjectController extends AbstractController
{

   /**
    * @Route("/", name="project2_index", methods="GET")
    */
    public function index(Project2Repository $project2Repository): Response
    {
        $em=2;
        var_dump($em);
        $all_session_variables = $this->get('session')->all();
        var_dump($all_session_variables);
        return $this->render('project2/index.html.twig', ['project2s' => $project2Repository->findAll()]);
    }

    /**
     * @Route("/new", name="project2_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $project2 = new Project2();
        $form = $this->createForm(Project2Type::class, $project2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($project2);
            $em->flush();

            return $this->redirectToRoute('project2_index');
        }

        return $this->render('project2/new.html.twig', [
            'project2' => $project2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="project2_show", methods="GET")
     */
    public function show(Project2 $project2): Response
    {
           $em = $this->getDoctrine()->getManager();
           $em->persist($project2);
           $em->flush();
           $repository = $this->getDoctrine()->getRepository(Tickets::class);
           $tickets = $repository->findBy(['project_id' => $project2->getId(),]);
        return $this->render('project2/show.html.twig', ['project2' => $project2, 'tickets' => $tickets ]);
    }

    /**
     * @Route("/{id}/edit", name="project2_edit", methods="GET|POST")
     */
    public function edit(Request $request, Project2 $project2): Response
    {
        $form = $this->createForm(Project2Type::class, $project2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('project2_edit', ['id' => $project2->getId()]);
        }

        return $this->render('project2/edit.html.twig', [
            'project2' => $project2,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/{id}", name="project2_delete", methods="DELETE")
     */
    public function delete(Request $request, Project2 $project2): Response
    {
        if ($this->isCsrfTokenValid('delete'.$project2->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($project2);
            $em->flush();
        }

        return $this->redirectToRoute('project2_index');
    }
}
