<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {

        
    	/*$em = $this->getDoctrine()->getManager();

    	$auto =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy(array("nombre" => "Autos", "estado"=> 1));
    	$slideAutos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlideVehiculos")->findBy(array(
            "categoria_vehiculo" => $auto , "estado" => 1
                )
        );
    	


    	$camioneta =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy(array("nombre" => "Camionetas", "estado"=> 1));
    	$slideCamionetas = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlideVehiculos")->findBy(array(
            "categoria_vehiculo" => $camioneta , "estado" => 1
                )
        );
    	

    	$suv =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy(array("nombre" => "Suv", "estado"=> 1));
    	$slideSuv = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlideVehiculos")->findBy(array(
            "categoria_vehiculo" => $suv , "estado" => 1
                )
        );


       	$hibrido =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy(array("nombre" => "Hibridos", "estado"=> 1));
    	$slideHibridos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlideVehiculos")->findBy(array(
            "categoria_vehiculo" => $hibrido , "estado" => 1
                )
        );

        return $this->render('CelmediaToyocostaVehiculosBundle::layout.html.twig' , array( "slideAutos" => $slideAutos , "slideCamionetas" => $slideCamionetas, "slideSuv" => $slideSuv, "slideHibridos" => $slideHibridos ));
        */

        return $this->render('CelmediaToyocostaVehiculosBundle::layout.html.twig');
    }

    public function obtenerVehiculosAction($tipoVehiculo, $prefijo, $alineacion){
        $em = $this->getDoctrine()->getManager();

        $vehiculo =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy(array("nombre" => $tipoVehiculo, "estado"=> 1));
        $slideVehiculos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlideVehiculos")->findBy(array(
            "categoria_vehiculo" => $vehiculo , "estado" => 1
                )
        );

        return $this->render('CelmediaToyocostaVehiculosBundle:Blocks:slide.vehiculos.html.twig' , array( "slideVehiculos" => $slideVehiculos, "prefijo" => $prefijo, "alineacion" => $alineacion));
    }

}
