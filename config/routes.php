<?php
// config/routes.php
use App\Controller\SecurityController;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();
$routes->add('login', new Route('/login', array(
    '_controller' => array(SecurityController::class, 'login'),
)));

return $routes;
