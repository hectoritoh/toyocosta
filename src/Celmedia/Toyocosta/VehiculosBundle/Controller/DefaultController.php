<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {


    	$em = $this->getDoctrine()->getManager();
		$slideVehiculos =$em->getRepository('CelmediaToyocostaVehiculosBundle:SlideVehiculos')->findBy(array("estado"=> 1 ));

        return $this->render('CelmediaToyocostaVehiculosBundle::layout.html.twig' , array( "slideVehiculos" => $slideVehiculos ));
    }
}
