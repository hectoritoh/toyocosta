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
        

    	return $this->render('CelmediaToyocostaVehiculosBundle:Default:index.html.twig' );
    }

    public function obtenerHeaderMenuAction(){

        $em = $this->getDoctrine()->getManager();
        
        $categoriasVehiculo = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy( array("estado"=> 1) );



        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:header.menu.html.twig' , array('categoriasVehiculo' => $categoriasVehiculo ) );
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


        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:vehiculo.html.twig' , array(
            "vehiculo" => $vehiculo,
            "vehiculoColores" => $vehiculoColores
        ));

	
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

        $em = $this->getDoctrine()->getManager();        
        
        $vehiculos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findBy(array(
            "estado" => 1
                )
        );

        $reservas = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:TipoReserva")->findBy(array(
            "estado" => 1
                )
        );
        

        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:mantenimiento.html.twig' , array("vehiculos" => $vehiculos , "reservas" => $reservas) ); 
    }

    public function testdriveAction(){

        $em = $this->getDoctrine()->getManager();        
        
        $agencias = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Establecimiento")->findBy(array(
            "estado" => 1
                )
        );

        $vehiculos_test = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:VehiculoTest")->findBy(array(
            "estado" => 1
                )
        );


        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:testdrive.html.twig' , array("agencias" => $agencias , "vehiculos" => $vehiculos_test ) ); 


    }

    public function contactenosAction(){


        $em = $this->getDoctrine()->getManager();        
        
        $agencias = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Establecimiento")->findBy(array(
            "estado" => 1
                )
        );

        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:contacto.html.twig', array( "agencias" => $agencias ));


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


    public function obtenerProductosxCategoriaAction($categoriaId){
        $em = $this->getDoctrine()->getManager();

        $categoria = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("id" => $categoriaId, "estado"=> 1));
        $vehiculos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findBy(array(
            "categoria" => $categoria,
            "estado" => 1
                )
        );
        return $this->render('CelmediaToyocostaVehiculosBundle:Mobile:productos.categoria.html.twig' , array( "vehiculos" => $vehiculos, "categoria" => $categoria ) );
    }


    
    // FUNCIONES PARA ENVIO DE CORREOS

    public function enviarTestAction(Request $request){

        $em = $this->getDoctrine()->getManager();    

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

            
            if(!$nombre || !$nacimiento || !$agencia || !$apellido || !$cedula || !$telefono || !$email || !$ciudad || !$vehiculo || !$fecha_test || !$hora_test || !$observacion  ){
                return new JsonResponse(array(
                    'codigo' => 0,
                    'mensaje' => "Complete todos los campos requeridos"
                ), 200); //codigo de error diferente
            }

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



            $subject = "Pedido de Informacion de Test Drive desde Web Movil Toyocosta"; 


            $body = '<strong>Informacion del test:</strong> <br /><br />               
            Nombre:  '.$info->getNombre().' <br />
            Apellido:   '. $info->getApellido() .' <br />
            Telefono:  '. $info->getTelefono() .'  <br />
            Email:  '. $info->getEmail() .' <br />
            Cedula:  '.$info->getCedula().' <br />
            Fecha de Nacimiento:   '. $info->getFechaNacimiento()->format('Y-m-d') .' <br />
            Agencia:   '. $info->getAgencia() .' <br />
            Ciudad:  '. $info->getCiudad() .' <br />
            Vehiculo:  '. $info->getVehiculo() .'  <br />
            Fecha del test:  '. $info->getFechaTest()->format('Y-m-d') .' <br />
            Hora del test:  '. $info->getHoraTest() .' <br />
            Observacion:  '. $info->getObservaciones() .' ';


 
            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            ->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))

            ->setTo(array( $email , 'ycosquillo@celmedia.com' => 'Admin'))
            
            ->setContentType("text/html")

            ->setBody($body);


            $envioMail = $this->get('mailer')->send($message);


            if ( $envioMail ) {

                $response = json_encode(array('codigo' => 1 ));

                return new Response($response, 200, array(
                    'Content-Type' => 'application/json'
                ));


            }else {
                 return new JsonResponse(array(
                    'codigo' => 0,
                    'mensaje' => "No se ha enviado su mensaje, intente de nuevo."
                ), 200); //codigo de error diferente
            }
        



        }
        return new JsonResponse(array(
            'codigo' => 0,
            'mensaje' => "No se ha recibido por Post"
        ), 200); //codigo de error diferente



    }

    public function enviarContactenosAction(Request $request){


        $em = $this->getDoctrine()->getManager(); 

        if ($request->isMethod('POST')) {

            $nombre = $request->request->get('nombre');
            $apellido = $request->request->get('apellido');
            $telefono = $request->request->get('telefono');
            $email = $request->request->get('email');
            $ciudad = $request->request->get('ciudad');
            $area = $request->request->get('area');
            $observacion = $request->request->get('observacion');


            $info = new \Celmedia\Toyocosta\ContenidoBundle\Entity\InfoContacto();

            $info->setNombre( $nombre  );
            $info->setApellido( $apellido  );
            $info->setTelefono( $telefono  );
            $info->setEmail( $email  );
            $info->setCiudad( $ciudad  );
            $info->setArea( $area  );
            $info->setObservaciones( $observacion  );
            
            
            $em->persist(  $info );
            $em->flush();



            $subject = "Pedido de Informacion Contacto desde Web Movil Toyocosta"; 

            $body = '<strong>Informacion de Contacto:</strong> <br /><br />               
            Nombre:  '.$info->getNombre().' <br />
            Apellido:   '. $info->getApellido() .' <br />
            Telefono:  '. $info->getTelefono() .'  <br />
            Email:  '. $info->getEmail() .' <br />
            Ciudad:  '. $info->getCiudad() .' <br />
            Area:   '. $info->getArea() .' <br />
            Observacion:  '. $info->getObservaciones() .' ';


 
            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            ->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))

            ->setTo(array( $email , 'cdnventas@toyocosta.com.ec' => 'Toyocosta', 'ycosquillo@celmedia.com' => 'Admin'))
            
            ->setContentType("text/html")

            ->setBody($body);


            $envioMail = $this->get('mailer')->send($message);


            if ( $envioMail ) {

                $response = json_encode(array('codigo' => 1 ));

                return new Response($response, 200, array(
                    'Content-Type' => 'application/json'
                ));


            }else {
                 return new JsonResponse(array(
                    'codigo' => 0,
                    'mensaje' => "No se ha enviado mensaje"
                ), 200); //codigo de error diferente
            }
        


        }



    }

    public function enviarCitaAction(Request $request){

        ini_set('max_execution_time', 600);

        $em = $this->getDoctrine()->getManager();


        if ($request->isMethod('POST')) {

            $nombre = $request->request->get('nombre');
            $apellido = $request->request->get('apellido');
            $telefono = $request->request->get('telefono');
            $email = $request->request->get('email');
            $celular = $request->request->get('celular');
            $fecha = $request->request->get('fecha');
            $reservaid = $request->request->get('reserva');
            $tallerid = $request->request->get('taller');
            $modeloid = $request->request->get('modelo');
            $kilometraje = $request->request->get('kilometraje');
            $comentario = $request->request->get('comentario');
            $observaciones = $request->request->get('observaciones');
            $regalo = $request->request->get('regalo');


            $seleccionoRegalo = $request->request->get('selectedRegalo');



            if(!$nombre || !$apellido || !$telefono || !$email || !$celular || !$fecha || !$reservaid || !$tallerid || !$kilometraje || !$modeloid ){
                return new JsonResponse(array(
                    'codigo' => 0,
                    'mensaje' => "Complete todos los campos requeridos"
                ), 200); //codigo de error diferente
            }

            $reserva = $em->getRepository('CelmediaToyocostaContenidoBundle:TipoReserva')->findOneBy(
                array(
                    'id' => $reservaid,
                    "estado" => 1
                )
            );
            $taller = $em->getRepository('CelmediaToyocostaContenidoBundle:Establecimiento')->findOneBy(
                array(
                    'id' => $tallerid,
                    "estado" => 1
                )
            );
            
            $obsequio = $em->getRepository('CelmediaToyocostaContenidoBundle:Obsequio')->findOneBy(
                array(
                    'id' => $regalo,
                    "estado" => 1
                )
            );

            $vehiculoModelo = $em->getRepository('CelmediaToyocostaVehiculosBundle:VehiculoModelos')->findOneBy(
                array(
                    'id' => $modeloid,
                    "estado" => 1
                )
            );


            if ($seleccionoRegalo !== "si" ) {

                $premio =  "Premio: No selecciono regalo";


            }else{
                
                $premio = "Premio: ".$obsequio->getNombre();
                
            }
            



            // Creamos el objeto infomantenimiento
            $mantenimiento = new \Celmedia\Toyocosta\ContenidoBundle\Entity\InfoMantenimiento();

            $mantenimiento->setNombre( $nombre  );
            $mantenimiento->setApellido( $apellido  );
            $mantenimiento->setTelefono( $telefono  );
            $mantenimiento->setEmail( $email  );
            $mantenimiento->setObservaciones( $observaciones  );
            $mantenimiento->setComentarios( $comentario  );
            $mantenimiento->setCelular( $celular  );
            $mantenimiento->setFechaTentativa( new \DateTime($fecha ) );
            $mantenimiento->setTipoReserva( $reserva );
            $mantenimiento->setTaller( $taller );
            $mantenimiento->setModelo( $vehiculoModelo );
            $mantenimiento->setKilometros( $kilometraje );



            $extraMensaje = " Modelo:  ".$mantenimiento->getModelo()->getNombre()." <br />
            Kilometraje:  ".$mantenimiento->getKilometros()." <br />
            Comentario:  ".$mantenimiento->getComentarios();



            $registro = new \Celmedia\Toyocosta\ContenidoBundle\Entity\Registro();

            $registro->setEstado(1);

            if($regalo){
                
                $registro->setObsequio( $obsequio );

            }

            $registro->setCita($mantenimiento);


            $em->persist(  $mantenimiento );
            $em->persist(  $registro );
            $em->flush();



            $arrayCorreo = array( $email => 'Recurso' , 'ycosquillo@celmedia.com' => 'Admin' );


            foreach ( $taller->getContactos() as $item) {

                array_push($arrayCorreo, $item->getEmail() );

            }


            $subject = "Cita de Mantenimiento desde Web Movil Toyocosta";
            $body = '<strong>Informaci&oacute;n de Cita de Mantenimiento:</strong> <br /><br />
            Nombre:  '.$mantenimiento->getNombre().' <br />
            Apellido:   '. $mantenimiento->getApellido() .' <br />
            Email:  '. $mantenimiento->getEmail() .' <br />
            Telefono:  '. $mantenimiento->getTelefono() .'  <br />
            Celular:  '. $mantenimiento->getCelular() .' <br />            
            Observaciones:  '. $mantenimiento->getObservaciones() .' <br />
            Fecha Tentativa:  '. $fecha .' <br />
            Tipo Reserva:  '. $mantenimiento->getTipoReserva()->getNombre() .' <br />
            Taller:  '. $mantenimiento->getTaller()->getNombre() .' <br />
            ' . $extraMensaje . ' <br /> 
            ' . $premio . ' <br />';
      

            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            ->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))

            ->setTo( $arrayCorreo )
            
            ->setContentType("text/html")

            ->setBody($body);


            $envioMail = $this->get('mailer')->send($message);


            if ( $envioMail ) {
                 return new JsonResponse(array(
                    'codigo' => 1,
                    'mensaje' => "El mensaje ha sido enviado"
                ), 200); //codigo de error diferente
            }else {
                 return new JsonResponse(array(
                    'codigo' => 0,
                    'mensaje' => "No se ha enviado mensaje"
                ), 200); //codigo de error diferente
            }
        

        }

        return new JsonResponse(array(
            'codigo' => 0,
            'mensaje' => "No se recibio por post"
        ), 200); //codigo de error diferente




    }

    public function enviarCotizacionAction(Request $request){

        $em = $this->getDoctrine()->getManager();        

        if ($request->isMethod('POST')) {

            $plazoid = $request->request->get('plazo');
            $valorentrada = floatval( $request->request->get('entrada') );
            $vehiculoid = $request->request->get('vehiculo');



            $nombre = $request->request->get('nombre');
            $apellido = $request->request->get('apellido');
            $cedula = $request->request->get('cedula');
            $telefono = $request->request->get('telefono');
            $email = $request->request->get('email');
            $mensaje = $request->request->get('mensaje');

            $ciudad = $request->request->get('ciudad');




            if(!$plazoid || !$vehiculoid || !$valorentrada || !$nombre || !$apellido || !$cedula || !$telefono || !$email || !$ciudad || !$mensaje ){
                return new JsonResponse(array(
                    'codigo' => 0,
                    'mensaje' => "Complete todos los campos requeridos"
                ), 200); //codigo de error diferente
            }

            $vehiculoPlazo = $em->getRepository('CelmediaToyocostaVehiculosBundle:Plazo')->findOneBy(
                array(
                    'id' => $plazoid,
                    "estado" => 1
                )
            );
            $vehiculo = $em->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findOneBy(
                array(
                    'id' => $vehiculoid,
                    "estado" => 1
                )
            );
            $variableVehiculo = $em->getRepository('CelmediaToyocostaContenidoBundle:Variables')->findOneBy(
                array(
                    "id" => 1, // id 1 para vehiculos
                    "estado" => 1
                )
            );

            
            
            $contenido = 'Mensaje: '.$mensaje.' , Vehiculo: '.$vehiculo->getNombre().'';

            // Creamos el objeto cotizacion

            $cotizacion = new \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoCotizacion();

            $cotizacion->setNombre( $nombre  );
            $cotizacion->setApellido( $apellido  );
            $cotizacion->setCedula( $cedula);
            $cotizacion->setTelefono( $telefono  );
            $cotizacion->setEmail( $email  );            
            $cotizacion->setCiudad( $ciudad  );
            $cotizacion->setMensaje( $contenido  );

            $cotizacion->setPlazo( $vehiculoPlazo );
            //$cotizacion->setVehiculoModelo( $vehiculo );

            $cotizacion->setValorEntrada( $valorentrada );
            $cotizacion->setInteresVehiculo( $variableVehiculo->getInteres() );
            $cotizacion->setInteresEntrada( $variableVehiculo->getEntradaMinima() );
            
            //almacenamos en la base

            $em = $this->getDoctrine()->getManager(); 
            $em->persist(  $cotizacion );
            $em->flush();


            
            $subject = "Pedido de Cotizacion Vehiculo desde Web Movil Toyocosta"; 

            $body = '<strong>Informacion del Cotizacion:</strong> <br /><br />               
            Nombre:  '.$nombre.' <br />
            Apellido:   '. $apellido .' <br />
            Cedula:  '.$cedula.' <br />
            Telefono:  '. $telefono .'  <br />
            Email:  '. $email .' <br />
            Ciudad:  '. $ciudad .' <br />
            Mensaje:  '. $mensaje .' <br />
            Plazo:  '. $vehiculoPlazo->getValor() .' meses  <br />
            Vehiculo:  '. $vehiculo->getNombre() .' <br />
            Valor de entrada:  '. $valorentrada .' ';


 
            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            ->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))

            ->setTo(array( $email , 'ycosquillo@celmedia.com' => 'Admin'))
            
            ->setContentType("text/html")

            ->setBody($body);


            $envioMail = $this->get('mailer')->send($message);


            if ( $envioMail ) {

                $response = json_encode(array('codigo' => 1 ));

                return new Response($response, 200, array(
                    'Content-Type' => 'application/json'
                ));


            }else {
                 return new JsonResponse(array(
                    'codigo' => 0,
                    'mensaje' => "No se ha enviado mensaje"
                ), 200); //codigo de error diferente
            }




        }

        return new JsonResponse(array(
            'codigo' => 0,
            'Mensaje' => "No se recibio por post"
        ), 200); //codigo de error diferente




    }



}