<?php

namespace Celmedia\Toyocosta\MontacargasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaCotizacion;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CelmediaToyocostaMontacargasBundle:Default:index.html.twig', array('name' => $name));
    }

    public function principalAction()
    {
   
        return $this->render('CelmediaToyocostaMontacargasBundle:Pages:principal.html.twig', array());
    }
    public function postVentaAction(){

    	return $this->render('CelmediaToyocostaMontacargasBundle:Pages:post_venta.html.twig', array());
    }

    public function rentaAction(){

    	return $this->render('CelmediaToyocostaMontacargasBundle:Pages:rentas.html.twig', array());
    }

    public function tecnologiaSasAction(){

    	return $this->render('CelmediaToyocostaMontacargasBundle:Pages:tecnologia_sas.html.twig', array());
    }

    public function usadosAction(){

    	return $this->render('CelmediaToyocostaMontacargasBundle:Pages:usados.html.twig', array());
    }

    public function productosAction(){

    	return $this->render('CelmediaToyocostaMontacargasBundle:Pages:productos.html.twig', array());
    }

    public function cotizacionAction(){

        $cotizacion = new MontacargaCotizacion();

        $form = $this->createFormBuilder($cotizacion)
        ->add("nombre", "text" , array("required"=> true ))
        ->add("apellido", "text" , array("required"=> true ))
        ->add("cedula", "text" , array("required"=> true ))
        ->add("email", "email" ,  array("required"=> true )) 
        ->add("telefono", "text" , array("required"=> true ))  
        ->add("ciudad", "text" , array("required"=> true ))
        ->add("mensaje", "textarea" , array("required"=> true ))
        ->add('captcha', 'captcha')
        ->getForm(); 


        return $this->render('CelmediaToyocostaMontacargasBundle:Pages:cotizacion.html.twig', array("form"=> $form->createView() , "error" => false ));
    }
}
