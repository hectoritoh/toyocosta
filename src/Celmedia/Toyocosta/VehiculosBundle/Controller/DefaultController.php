<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $categoriasVehiculo = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy( array("estado"=> 1) );

    	return $this->render('CelmediaToyocostaVehiculosBundle:Default:index.html.twig', array('categoriasVehiculo' => $categoriasVehiculo ) );
    }

    public function obtenerMenuPrincipalAction(){
        $em = $this->getDoctrine()->getManager();
        
        $categoriasVehiculo = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy( array("estado"=> 1) );
        return $this->render('CelmediaToyocostaVehiculosBundle:Blocks:top.menu.principal.html.twig', array('categoriasVehiculo' => $categoriasVehiculo ) );
    }

    public function obtenerVehiculosAction($tipoVehiculo, $prefijo){
        $em = $this->getDoctrine()->getManager();

        $categoria =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy(array("id" => $tipoVehiculo, "estado"=> 1));
        $slideVehiculos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlideVehiculos")->findBy(array(
            "categoria_vehiculo" => $categoria , "estado" => 1
                )
        );

        return $this->render('CelmediaToyocostaVehiculosBundle:Blocks:slide.vehiculos.html.twig' , array( "slideVehiculos" => $slideVehiculos, "prefijo" => $prefijo));
    }

    public function obtenerVehiculos2Action($tipoVehiculo, $prefijo, $alineacion){
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

    public function obtenerVehiculosXCategoriaAction($categoriaId){
        $em = $this->getDoctrine()->getManager();

        $categoria = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("id" => $categoriaId, "estado"=> 1));
        $vehiculos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findBy(array(
            "categoria" => $categoria,
            "estado" => 1
                )
        );
        return $this->render('CelmediaToyocostaVehiculosBundle:Blocks:vehiculos.submenu.html.twig' , array( "vehiculos" => $vehiculos, "categoria" => $categoria ) );
    }


    public function verVehiculoAction($vehiculoid){
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
        $vehiculoModelos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:VehiculoModelos")->findBy(array(
            "vehiculomodel" => $vehiculo,
            "estado" => 1
                )
        );
       $vehiculoGaleria = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:VehiculoGaleria")->findBy(array(
            "vehiculogaleria" => $vehiculo,
            "estado" => 1
                )
        );

        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:vehiculo.html.twig' , array(
            "vehiculo" => $vehiculo,
            "vehiculoColores" => $vehiculoColores,
            "vehiculoModelos" => $vehiculoModelos,
            "vehiculoGaleria" => $vehiculoGaleria
        ));
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


    public function certificadosAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:certificados.html.twig');
    }


    public function landingAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Forms:landing.html.twig');
    }




    // public function envioContactoAction(Request $request){


    //     $nombre = $request->request->get('nombre');
    //     $apellido = $request->request->get('apellido');
    //     $telefono = $request->request->get('telefono');
    //     $email = $request->request->get('email');
    //     $ciudad = $request->request->get('ciudad');
    //     $area = $request->request->get('area');
    //     $observaciones = $request->request->get('observaciones');


    //     $info = new \Celmedia\Toyocosta\ContenidoBundle\Entity\InfoContacto();

    //     $info->setNombre( $nombre  );
    //     $info->setApellido( $apellido  );
    //     $info->setTelefono( $telefono  );
    //     $info->setEmail( $email  );
    //     $info->setCiudad( $ciudad  );
    //     $info->setArea( $area  );
    //     $info->setObservaciones( $observaciones  );
        
        
    //     $em = $this->getDoctrine()->getManager(); 
    //     $em->persist(  $info );
    //     $em->flush();


    //     // $this->enviarCorreo($email, $info );

    //     echo "ok";

    //     return new Response();


    // }



}
