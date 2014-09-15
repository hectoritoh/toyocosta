<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Input;



class MobileController extends Controller
{

	    public function indexMobilAction()
    {
        
        // $em = $this->getDoctrine()->getManager();
        
        // $categoriasVehiculo = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy( array("estado"=> 1) );

    	return $this->render('CelmediaToyocostaVehiculosBundle:Default:index.html.twig' );
    }


}