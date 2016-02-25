<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Input;

class CustomController extends Controller
{


    /**********CUSTOM************/
    public function homeAction(){
        
        $em = $this->getDoctrine()->getManager();
        
        $categoriasVehiculo = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy( array("estado"=> 1) );



        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:index.html.twig', array('categoriasVehiculo' => $categoriasVehiculo ) );

    }

    public function verVehiculoAction($id){
        $em = $this->getDoctrine()->getManager();

        $vehiculo = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findOneBy(array(
            "id" => $id,
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

        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:vehiculo.html.twig' , array(
            "vehiculo" => $vehiculo,
            "vehiculoColores" => $vehiculoColores,
            "vehiculoModelos" => $vehiculoModelos,
            //"vehiculoGaleria" => $vehiculoGaleria
        ));
    }

    public function homeVehiculosAction(){
        $em = $this->getDoctrine()->getManager();
        
        $slidePrincipal = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlidePrincipal")->findBy(array(
            "estado" => 1 , "seccion" => "principal"
                )
        );



        $categoriaid =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "autos", "estado"=> 1));
        $vehiculosautos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlideVehiculos")->findBy(array(
            "categoria_vehiculo" => $categoriaid , "estado" => 1
                )
        );

        
        $camionetaid =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "camionetas", "estado"=> 1));
        $vehiculoscamionetas = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlideVehiculos")->findBy(array(
            "categoria_vehiculo" => $camionetaid , "estado" => 1
                )
        );

        $terrenoid =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "todoterreno", "estado"=> 1));
        $vehiculostodoterreno = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlideVehiculos")->findBy(array(
            "categoria_vehiculo" => $terrenoid , "estado" => 1
                )
        );


        function shuffle_assoc($array)
        {
            // Initialize
                $shuffled_array = array();

            // Get array's keys and shuffle them.
                $shuffled_keys = array_keys($array);
                shuffle($shuffled_keys);

            // Create same array, but in shuffled order.
                foreach ( $shuffled_keys AS $shuffled_key ) 
                {
                    $shuffled_array[  $shuffled_key  ] = $array[  $shuffled_key  ];
                } 
            // Return
                return $shuffled_array;
        }


        $autos = shuffle_assoc($vehiculosautos); //randomize
        $camionetas = shuffle_assoc($vehiculoscamionetas); //randomize
        $todoterreno = shuffle_assoc($vehiculostodoterreno); //randomize



        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:home.vehiculos.html.twig' , array( "slidePrincipal" => $slidePrincipal, 'autos' => $autos, 'camionetas' => $camionetas, 'todoterreno' => $todoterreno ));
    }

    public function exoneradosHomeAction(){


        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:exonerados.html.twig' , array());
    }

    public function postventaAction(){


        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:postventa.html.twig' , array());
    }

    public function exoneradosInfoAction($tipo)
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:exonerados_info.html.twig' , array("tipo" => $tipo));

    }
    public function talleresyserviciosAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:talleresyservicios.html.twig' , array());        
    }

    public function certificadostoyocostaAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:certificados.html.twig' , array());        
    }


    public function testdriveCustomAction(Request $request)
    {
        
        $em = $this->getDoctrine()->getManager();        
        
        $agencias = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Establecimiento")->findBy(array(
            "estado" => 1
                )
        );

        $vehiculos_test = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:VehiculoTest")->findBy(array(
            "estado" => 1
                )
        );

        if ($request->isMethod('POST')) {

            $nombre = $request->request->get('nombre');
            $apellido = $request->request->get('apellido');
            $telefono = $request->request->get('telefono');
            $email = $request->request->get('email');
            $cedula = $request->request->get('cedula');
            $nacimiento = $request->request->get('nacimiento');
            $agencia = $request->request->get('agencia');
            $ciudad = $request->request->get('ciudad');
            $vehiculo = $request->request->get('vehiculo');
            $fecha_test = $request->request->get('fecha_test');
            $hora_test = $request->request->get('hora_test');
            $observacion = $request->request->get('observacion');

    

            $info = new \Celmedia\Toyocosta\ContenidoBundle\Entity\InfoTestDrive();

            $info->setNombre( $nombre  );
            $info->setApellido( $apellido  );
            $info->setTelefono( $telefono  );
            $info->setEmail( $email  );
            $info->setCedula( $cedula);
            $info->setFechaNacimiento( new \DateTime($nacimiento) );
            $info->setAgencia( $agencia  );
            $info->setCiudad( $ciudad  );
            $info->setVehiculo($vehiculo);
            $info->setFechaTest( new \DateTime($fecha_test ) );
            $info->setHoraTest( $hora_test  );
            $info->setObservaciones( $observacion  );
            
            
            $em = $this->getDoctrine()->getManager(); 
            $em->persist(  $info );
            $em->flush();

            $formulario = "testdrive";

            if( $this->enviarCorreo($email, $info, $formulario ) ){
                return new JsonResponse(array(
                    'codigo' => 1,
                    'Mensaje' => "El mensaje ha sido enviado"
                ), 200); //codigo de error diferente
            }else{
                return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "No se ha recibido vehiculo"
                ), 200); //codigo de error diferente
            }




           



        }



        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:testdrive.html.twig' , array( "agencias" => $agencias , "vehiculos_test"=> $vehiculos_test  ));

    }

    public function citatalleresAction($value='')
    {
        

        $em = $this->getDoctrine()->getManager();        
        
        $vehiculos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findBy(array(
            "estado" => 1
                )
        );

        $reservas = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:TipoReserva")->findBy(array(
            "estado" => 1
                )
        );
        

        $banners = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlidePrincipal")->findBy(array(
            "estado" => 1 , "seccion" => "mantenimiento"
                )
        );


        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:citatalleres.html.twig' , array( "vehiculos" => $vehiculos , "reservas" => $reservas , "banners" => $banners ));


    }

    public function tallermovilAction($value='')
    {
        
        $em = $this->getDoctrine()->getManager();        
        
        $vehiculos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findBy(array(
            "estado" => 1
                )
        );

        $reservas = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:TipoReserva")->findBy(array(
            "estado" => 1
                )
        );
        

        $banners = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlidePrincipal")->findBy(array(
            "estado" => 1 , "seccion" => "mantenimiento"
                )
        );


        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:tallermovil.html.twig' , array( "vehiculos" => $vehiculos , "reservas" => $reservas , "banners" => $banners ));


    }

    public function mantenimientoexpressAction($value='')
    {
        
        $em = $this->getDoctrine()->getManager();        
        
        $vehiculos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findBy(array(
            "estado" => 1
                )
        );

        $reservas = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:TipoReserva")->findBy(array(
            "estado" => 1
                )
        );
        

        $banners = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlidePrincipal")->findBy(array(
            "estado" => 1 , "seccion" => "mantenimiento"
                )
        );


        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:mantenimientoexpress.html.twig' , array( "vehiculos" => $vehiculos , "reservas" => $reservas , "banners" => $banners ));


    }

    public function contactenosAction(){

        $em = $this->getDoctrine()->getManager();        
        
        $agencias = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Establecimiento")->findBy(array(
            "estado" => 1
                )
        );

        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:contacto.html.twig', array( "agencias" => $agencias ));
    }

    public function contactenosXAgenciaAction($agenciaid){

        $em = $this->getDoctrine()->getManager();        
        
        $agencias = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Establecimiento")->findBy(array(
            "estado" => 1
                )
        );

        $agenciaRecibida = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Establecimiento")->findOneBy(array(
            "id" => $agenciaid,
            "estado" => 1
                )
        );

        
        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:contacto.html.twig', array( "agencias" => $agencias, "agenciaRecibida" => $agenciaRecibida ));


    }

    public function vehiculosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $autos =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "autos", "estado"=> 1));        
        $vehiculos_autos = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findBy( array("estado"=> 1 , "categoria" => $autos ) );


        $camionetas =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "camionetas", "estado"=> 1));        
        $vehiculos_camionetas = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findBy( array("estado"=> 1 , "categoria" => $camionetas ) );



        $todoterreno =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "todoterreno", "estado"=> 1));
        $vehiculos_todoterreno = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findBy( array("estado"=> 1 , "categoria" => $todoterreno ) );


        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:vehiculos.html.twig' , array( "vehiculos_autos" => $vehiculos_autos, "vehiculos_camionetas" => $vehiculos_camionetas, "vehiculos_todoterreno" =>$vehiculos_todoterreno ));

    }

    public function obtenerFooterAction()
    {
        $em = $this->getDoctrine()->getManager();

        $autos =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "autos", "estado"=> 1));        
        $vehiculos_autos = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findBy( array("estado"=> 1 , "categoria" => $autos ) );


        $camionetas =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "camionetas", "estado"=> 1));        
        $vehiculos_camionetas = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findBy( array("estado"=> 1 , "categoria" => $camionetas ) );



        $todoterreno =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "todoterreno", "estado"=> 1));
        $vehiculos_todoterreno = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findBy( array("estado"=> 1 , "categoria" => $todoterreno ) );


        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:footer.html.twig' , array( "vehiculos_autos" => $vehiculos_autos, "vehiculos_camionetas" => $vehiculos_camionetas, "vehiculos_todoterreno" =>$vehiculos_todoterreno ));

    }


    public function obtenerVehiculosXCategoriaAction($categoriaId){
        $em = $this->getDoctrine()->getManager();

        $categoria = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("id" => $categoriaId, "estado"=> 1));
        $vehiculos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findBy(array(
            "categoria" => $categoria,
            "estado" => 1
                )
        );
        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:vehiculos.submenu.html.twig' , array( "vehiculos" => $vehiculos, "categoria" => $categoria ) );
    }
    

    public function obtenerSlidePrincipalAction(){
        $em = $this->getDoctrine()->getManager();
        
        $slidePrincipal = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlidePrincipal")->findBy(array(
            "estado" => 1 , "seccion" => "principal"
                )
        );

        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:slide.principal.html.twig' , array( "slidePrincipal" => $slidePrincipal));
    }

    public function obtenerMenuPrincipalAction(){
        $em = $this->getDoctrine()->getManager();
        
        $categoriasVehiculo = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy( array("estado"=> 1) );
        return $this->render('CelmediaToyocostaVehiculosBundle:Custom:menu.principal.html.twig', array('categoriasVehiculo' => $categoriasVehiculo ) );
    }






}