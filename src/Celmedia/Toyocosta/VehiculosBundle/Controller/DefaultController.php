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

        return $this->render('CelmediaToyocostaVehiculosBundle:Default:index.html.twig');
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

    public function obtenerSlidePrincipalAction(){
        $em = $this->getDoctrine()->getManager();        
        
        $slidePrincipal = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlidePrincipal")->findBy(array(
            "estado" => 1
                )
        );

        return $this->render('CelmediaToyocostaVehiculosBundle:Blocks:slide.principal.html.twig' , array( "slidePrincipal" => $slidePrincipal));
    }


    public function verVehiculoAction($vehiculo){

        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:vehiculo.html.twig' , array("vehiculo" => $vehiculo ));
    }


    public function empresaAction(){

        $em = $this->getDoctrine()->getManager();        
        
        $proposito = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Contenido")->findBy(array(
            "abreviatura" => "proposito" , "estado" => 1
                )
        );

        $vision = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Contenido")->findBy(array(
            "abreviatura" => "vision" ,"estado" => 1
                )
        );

        $agencias = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Establecimiento")->findBy(array(
            "estado" => 1
                )
        );


        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:empresa.html.twig' , array("proposito" => $proposito , "vision" => $vision, "agencias" => $agencias  ));
    }

    public function mantenimientoAction(){
        
        $em = $this->getDoctrine()->getManager();        
        
        $vehiculos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findBy(array(
            "estado" => 1
                )
        );
        
        return $this->render('CelmediaToyocostaVehiculosBundle:Forms:matenimiento.html.twig' , array( "vehiculos" => $vehiculos  ));
    }

    public function testAction(){

        $em = $this->getDoctrine()->getManager();        
        
        $agencias = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Establecimiento")->findBy(array(
            "estado" => 1
                )
        );

        return $this->render('CelmediaToyocostaVehiculosBundle:Forms:testdrive.html.twig' , array( "agencias" => $agencias  ));
    }

    public function rrhhAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Forms:rrhh.html.twig');
    }

    public function contactenosAction(){

        $em = $this->getDoctrine()->getManager();        
        
        $agencias = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Establecimiento")->findBy(array(
            "estado" => 1
                )
        );
        
        return $this->render('CelmediaToyocostaVehiculosBundle:Forms:contacto.html.twig', array( "agencias" => $agencias  ));
    }



}
