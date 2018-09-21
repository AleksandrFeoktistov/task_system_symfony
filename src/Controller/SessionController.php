<?php

namespace App\Controller;



use App\Entity\Users;
use App\Repository\UsersRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
/**
 * @Route("/session")
 */
class SessionController extends AbstractController
{

  /**
   * @Route("/", name="session_index", methods="GET")
   */
     public function session(SessionInterface $session)
   {
       //$session->set('foo', 'bar');
       return $this->render('project2/login.html.twig');
    }
    /**
     * @Route("/login", name="session_login", methods="POST")
     */
       public function login(SessionInterface $session)
     {
       $repository = $this->getDoctrine()->getRepository(Users::class);
       $users = $repository->findAll();
       if()
       return new Response(var_dump($_POST);
      }
}
