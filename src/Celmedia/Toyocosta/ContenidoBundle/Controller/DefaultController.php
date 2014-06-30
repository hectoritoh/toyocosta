<?php

namespace Celmedia\Toyocosta\ContenidoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CelmediaToyocostaContenidoBundle:Default:index.html.twig', array('name' => $name));
    }
}
