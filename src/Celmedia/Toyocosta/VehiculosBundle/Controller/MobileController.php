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
    public function verVehiculoAction($vehiculoid , $vehname){


        $em = $this->getDoctrine()->getManager();

        $vehiculo = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findOneBy(array(
            "id" => $vehiculoid,
            "estado" => 1
                )
        );

        $vehiculoColores = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:VehiculoColores")->findBy(array(
            "vehiculo" => $vehiculo,
            "estado" => 1
                )
        );
        // $vehiculoModelos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:VehiculoModelos")->findBy(array(
        //     "vehiculomodel" => $vehiculo,
        //     "estado" => 1
        //         )
        // );
        /*
        $vehiculoGaleria = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:VehiculoGaleria")->findBy(array(
            "vehiculogaleria" => $vehiculo,
            "estado" => 1
                )
        );*/

        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:vehiculo.html.twig' , array(
            "vehiculo" => $vehiculo,
            "vehiculoColores" => $vehiculoColores
            // "vehiculoModelos" => $vehiculoModelos,
            //"vehiculoGaleria" => $vehiculoGaleria
        ));



    	// return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:vehiculo.html.twig' );	
    }

 	public function cotizarVehiculoAction(){

        $em = $this->getDoctrine()->getManager();

        $vehiculos = $em->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findBy( array("estado"=> 1 ) );

    	return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:cotizar.vehiculo.html.twig', array("vehiculos" => $vehiculos ));	
    }

    public function cotizarVehiculoxIdAction($vehiculoid){

        $em = $this->getDoctrine()->getManager();

        $vehiculos = $em->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findBy( array("estado"=> 1 ) );

        $vehiculoSeleccionado = $em->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findOneBy(array(
            "id" => $vehiculoid,
            "estado" => 1
            )
        );


        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:cotizar.vehiculo.html.twig' , array("vehiculos" => $vehiculos , "vehiculoSeleccionado" => $vehiculoSeleccionado ) );    
    }

	public function pirelliAction(){

    	return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:pirelli.html.twig' );	
    }

    public function montacargasAction(){

    	return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:montacargas.html.twig' );	
    }

    public function mantenimientoAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:mantenimiento.html.twig' ); 
    }

    public function testdriveAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:testdrive.html.twig' ); 
    }

    public function contactenosAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:contacto.html.twig' ); 
    }

    // Render Controllers

    public function obtenerSlidePrincipalAction(){
        $em = $this->getDoctrine()->getManager();
        
        $slidePrincipal = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlidePrincipal")->findBy(array(
            "estado" => 1 , "seccion" => "principal"
                )
        );

        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:slide.principal.html.twig' , array( "slidePrincipal" => $slidePrincipal));
    }

    public function obtenerMenuPrincipalAction(){
        $em = $this->getDoctrine()->getManager();
        
        $categoriasVehiculo = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy( array("estado"=> 1) );
        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:menu.html.twig', array('categoriasVehiculo' => $categoriasVehiculo ) );
    }

    public function obtenerVehiculosXCategoriaAction($categoriaId){
        $em = $this->getDoctrine()->getManager();

        $categoria = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("id" => $categoriaId, "estado"=> 1));
        $vehiculos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findBy(array(
            "categoria" => $categoria,
            "estado" => 1
                )
        );
        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:vehiculos.categoria.html.twig' , array( "vehiculos" => $vehiculos, "categoria" => $categoria ) );
    }



}