<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    // public function indexAction($name)
    // {
    //     return $this->render('CelmediaToyocostaVehiculosBundle:Default:index.html.twig', array('name' => $name));
    // }
    public function indexAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle::layout.html.twig');
    }
}
