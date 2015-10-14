<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Input;

class DefaultController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $categoriasVehiculo = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findBy( array("estado"=> 1) );

    	return $this->render('CelmediaToyocostaVehiculosBundle:Default:index.html.twig', array('categoriasVehiculo' => $categoriasVehiculo ) );
    }

    public function autosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categoriaid =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "autos", "estado"=> 1));
        
        $vehiculos = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findBy( array("estado"=> 1 , "categoria" => $categoriaid ) );

        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:productos.html.twig', array("categoria_vehiculo" => "autos" , 'vehiculos' => $vehiculos ) );
    }

    public function camionetasAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categoriaid =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "camionetas", "estado"=> 1));
        
        $vehiculos = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findBy( array("estado"=> 1 , "categoria" => $categoriaid ) );

        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:productos.html.twig', array("categoria_vehiculo" => "camionetas" , 'vehiculos' => $vehiculos ) );
    }


    public function suvAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categoriaid =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "todoterreno", "estado"=> 1));
        
        $vehiculos = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findBy( array("estado"=> 1 , "categoria" => $categoriaid ) );

        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:productos.html.twig', array("categoria_vehiculo" => "todoterreno" , 'vehiculos' => $vehiculos ) );
    }


    public function hibridosAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categoriaid =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:CategoriaVehiculo')->findOneBy(array("nombre" => "hibridos", "estado"=> 1));
        
        $vehiculos = $this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findBy( array("estado"=> 1 , "categoria" => $categoriaid ) );

        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:productos.html.twig', array("categoria_vehiculo" => "hibridos" , 'vehiculos' => $vehiculos ) );
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
            "estado" => 1 , "seccion" => "principal"
                )
        );

        return $this->render('CelmediaToyocostaVehiculosBundle:Blocks:slide.principal.html.twig' , array( "slidePrincipal" => $slidePrincipal));
    }


    public function obtenerSlideMotosAction(){
        $em = $this->getDoctrine()->getManager();
        
        $categoria = $this->getDoctrine()->getRepository('CelmediaToyocostaMotosBundle:MotoCategoria')->findBy(array("estado"=> 1));

        return $this->render('CelmediaToyocostaVehiculosBundle:Blocks:slide.motos.html.twig' , array( "categoria" => $categoria));
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
        /*
        $vehiculoGaleria = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:VehiculoGaleria")->findBy(array(
            "vehiculogaleria" => $vehiculo,
            "estado" => 1
                )
        );*/

        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:vehiculo.html.twig' , array(
            "vehiculo" => $vehiculo,
            "vehiculoColores" => $vehiculoColores,
            "vehiculoModelos" => $vehiculoModelos,
            //"vehiculoGaleria" => $vehiculoGaleria
        ));
    }


    public function exoneradosAction(){


        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:exonerados.html.twig' , array());
    }

    public function avaluoAction(){


        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:avaluo.html.twig' , array());
    }



    public function uploadFotoDataAction()
    {
        $request = $this->get('request');

        $uploaded_file = $request->files->get('sm_input_file');
        $path = 'uploads/avaluo/';
        $filename = "";

        if ($uploaded_file)
        {

                $uploaded_file_info = pathinfo($uploaded_file->getClientOriginalName());
                $filename = uniqid() . "-" . $uploaded_file->getClientOriginalName();
                $uploaded_file->move($path, $filename);

            $response = 'success';
        }

        else $response = 'error';

        //$response = new Response(json_encode(array('response'=>$response)));
        //$response->headers->set('Content-Type', 'application/json');
        //return $response;

        return new JsonResponse(array(
            'response' => $response,
            "rutaarchivo" => $path . $filename,
            "archivo"=> $filename
        )); //codigo de error diferente
    }


    public function envioAvaluoAction(Request $request)
    {
        

        if ($request->isMethod('POST')) {

            $nombre = $request->request->get('nombre');
            $apellido = $request->request->get('apellido');
            $cedula = $request->request->get('cedula');
            $email = $request->request->get('email');
            $modelo = $request->request->get('modelo');
            $celular = $request->request->get('celular');

            $foto1 = $request->request->get('foto1');
            $foto2 = $request->request->get('foto2');
            $foto3 = $request->request->get('foto3');
            $foto4 = $request->request->get('foto4');



            $message = \Swift_Message::newInstance()
                ->setSubject('Avaluo de Pintura desde Toyocosta ')

                ->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))

                ->setTo(array( 'cdnventas@toyocosta.com.ec' => 'Cdn Ventas' ))
                //->setTo(array( 'ycosquillo@celmedia.com' => 'Administrador de seminuevos Toyocosta' ))

                ->setContentType("text/html")

                ->setBody('<h1>Información del Vehículo</h1> <br />             
                <strong>Nombre:</strong>  '.$nombre.' <br />
                <strong>Apellido:</strong>  '.$apellido.' <br />
                <strong>Cedula:</strong>  '.$cedula.' <br />
                <strong>Celular:</strong>  '.$celular.' <br />
                <strong>Email:</strong>  '.$email.' <br />
                <strong>Modelo:</strong>   '. $modelo .' <br /> '

                );

            if( $foto1 ){
                $message->attach(\Swift_Attachment::fromPath( $foto1 ));
            }
            if( $foto2 ){
                $message->attach(\Swift_Attachment::fromPath( $foto2 ));
            }
            if( $foto3 ){
                $message->attach(\Swift_Attachment::fromPath( $foto3 ));
            }
            if( $foto4 ){
                $message->attach(\Swift_Attachment::fromPath( $foto4 ));
            }


            $envioMail = $this->get('mailer')->send($message);

            // $transport = $this->container->get('mailer')->getTransport();
            // $spool = $transport->getSpool();
            // $spool->flushQueue($this->container->get('swiftmailer.transport.real'));


            if ( $envioMail ) {
                 return new JsonResponse(array(
                    'codigo' => 1,
                    'Mensaje' => "El mensaje ha sido enviado"
                ), 200); //codigo de error diferente
            } else {
                 return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "No se ha enviado mensaje"
                ), 200); //codigo de error diferente
            }



            ////////////////////////////////////////////////////            
        }

        return new JsonResponse(array(
            'codigo' => 0,
            'Mensaje' => "No se recibio por post"
        ), 200); //codigo de error diferente


    }

  





    public function exoneradosImpuestosAction($tipo)
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:exonerados-impuestos.html.twig' , array("tipo" => $tipo));

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

        $reservas = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:TipoReserva")->findBy(array(
            "estado" => 1
                )
        );
        

        $banners = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlidePrincipal")->findBy(array(
            "estado" => 1 , "seccion" => "mantenimiento"
                )
        );


        return $this->render('CelmediaToyocostaVehiculosBundle:Forms:matenimiento.html.twig' , array( "vehiculos" => $vehiculos , "reservas" => $reservas , "banners" => $banners ));
    }

    public function mantenimientoXServicioAction($servicioid){

        $em = $this->getDoctrine()->getManager();        
        
        $vehiculos = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findBy(array(
            "estado" => 1
                )
        );

        $reservas = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:TipoReserva")->findBy(array(
            "estado" => 1
                )
        );
        
        $reservaRecibida = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:TipoReserva")->findBy(array(
            "estado" => 1 , "id" => $servicioid
                )
        );


        return $this->render('CelmediaToyocostaVehiculosBundle:Forms:matenimiento.html.twig' , array( "vehiculos" => $vehiculos , "reservas" => $reservas , "reservaRecibida" => $reservaRecibida ));



    }


    public function testAction(Request $request){

        $em = $this->getDoctrine()->getManager();        
        
        $agencias = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Establecimiento")->findBy(array(
            "estado" => 1
                )
        );

        $vehiculos_test = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:VehiculoTest")->findBy(array(
            "estado" => 1
                )
        );


        // $form = $this->createFormBuilder()
        //     ->add('nombre', 'text')
        //     ->add('apellido', 'text')
        //     ->add('telefono', 'text')
        //     ->add('email', 'text')
        //     ->add('cedula', 'text')
        //     ->add('nacimiento', 'date', array('widget' => 'single_text'))
        //     ->add('agencia', 'choice', array(
        //     'choices'   => $agencias
        //     ))
        //     ->add('ciudad', 'text')
        //     ->add('vehiculo', 'choice', array(
        //     'choices'   => $vehiculos_test
        //     ))
        //     ->add('fecha_test', 'date', array('widget' => 'single_text'))
        //     ->add('hora_test', 'text')
        //     ->add('observacion', 'textarea')            
        //     ->add('captcha', 'captcha', array(
        //         'label' => 'Enter Captcha',
        //         'required' => true,
        //         'invalid_message' => 'The captcha code is invalid.'
        //         ))
        //     ->getForm();


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



        return $this->render('CelmediaToyocostaVehiculosBundle:Forms:testdrive.html.twig' , array( "agencias" => $agencias , "vehiculos_test"=> $vehiculos_test  ));


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

        return $this->render('CelmediaToyocostaVehiculosBundle:Forms:contacto.html.twig', array( "agencias" => $agencias ));
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

        
        return $this->render('CelmediaToyocostaVehiculosBundle:Forms:contacto.html.twig', array( "agencias" => $agencias, "agenciaRecibida" => $agenciaRecibida ));


    }

    public function certificadosAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Pages:certificados.html.twig');
    }


    public function consultarObsequiosAction(Request $request){


       
        if ($request->isMethod('POST')) {


            $id_taller = $request->request->get('taller');


            $em = $this->getDoctrine()->getManager(); 

            // $obsequios = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:Obsequio")->findBy(array(
            //     "estado" => 1 ,
            //     "establecimiento" => $id_taller
            //     )
            // );
            

            $connection = $em->getConnection();
            $sqlObsequios = "
                        SELECT obsequio. * , IFNULL(A.registro, 0) registro FROM obsequio 
                        LEFT JOIN (SELECT obsequio_id, count(obsequio_id) registro 
                        FROM registro GROUP BY obsequio_id) A ON obsequio.id = A.obsequio_id WHERE obsequio.estado = 1 AND obsequio.establecimiento_id = '".$id_taller."'
                          ";

            $query = $connection->prepare($sqlObsequios);
            $query->execute();
            $obsequios = $query->fetchAll();


            $arrayObsequios = array();


            for ($i=0; $i < count($obsequios) ; $i++) { 
                
                array_push($arrayObsequios, array('id' => $obsequios[$i]['id'], 'imagen' => $obsequios[$i]['imagen'], 'stock' => $obsequios[$i]['stock'], 'registro' => $obsequios[$i]['registro'] ) );
            }

            // foreach ($obsequios as $obsequio) {
            //     array_push($arrayObsequios, array('id' => $obsequio->getId() , 'imagen' => $obsequio->getImagen() ) );
            // }


            return new JsonResponse(array(
                'codigo' => 1,
                'obsequios' => $arrayObsequios
            ), 200);            
        }
        return new JsonResponse(array(
            'codigo' => 0,
            'Mensaje' => "No se recibio por post"
        ), 200); //codigo de error diferente



    }
    public function getTallerAction(Request $request){


        if ($request->isMethod('POST')) {


            $reserva_id = $request->request->get('reserva');


            $em = $this->getDoctrine()->getManager(); 

            $reservaTaller = $this->getDoctrine()->getRepository("CelmediaToyocostaContenidoBundle:TipoReserva")->findOneBy(array(
                "estado" => 1 ,
                "id" => $reserva_id
                )
            );
            

            $arrayEstablecimientos = array();

            foreach ($reservaTaller->getTalleres() as $taller) {
                array_push($arrayEstablecimientos, array('id' => $taller->getId() , 'nombre' => $taller->getNombre() ) );
            }


            return new JsonResponse(array(
                'codigo' => 1,
                'talleres' => $arrayEstablecimientos
            ), 200);            
        }
        return new JsonResponse(array(
            'codigo' => 0,
            'Mensaje' => "No se recibio por post"
        ), 200); //codigo de error diferente
    }

    public function enviarCorreo($correos_array, $info , $formulario) {

            if ($formulario == "testdrive") {

                $subject = "Pedido de Informacion de Test Drive desde Toyocosta"; 


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
            
            }elseif ($formulario == "contacto") {
                
                $subject = "Pedido de Informacion Contacto desde Toyocosta"; 

                $body = '<strong>Informacion de Contacto:</strong> <br /><br />               
                Nombre:  '.$info->getNombre().' <br />
                Apellido:   '. $info->getApellido() .' <br />
                Telefono:  '. $info->getTelefono() .'  <br />
                Email:  '. $info->getEmail() .' <br />
                Ciudad:  '. $info->getCiudad() .' <br />
                Area:   '. $info->getArea() .' <br />
                Observacion:  '. $info->getObservaciones() .' ';

            }elseif($formulario == "formcotizacion"){

                $subject = "Pedido de Informacion Cotización desde Toyocosta"; 

                $body = '<strong>Informacion del Cotizacion:</strong> <br /><br />               
                Nombre:  '.$info->getNombre().' <br />
                Apellido:   '. $info->getApellido() .' <br />
                Cedula:  '.$info->getCedula().' <br />
                Telefono:  '. $info->getTelefono() .'  <br />
                Email:  '. $info->getEmail() .' <br />
                Ciudad:  '. $info->getCiudad() .' <br />
                Mensaje:  '. $info->getMensaje() .' <br />
                Plazo:  '. $info->getPlazo()->getValor() .' meses  <br />
                Modelo:  '. $info->getVehiculoModelo()->getNombre() .' <br />
                Valor de entrada:  '. $info->getValorEntrada() .' <br />
                Interes del vehiculo:  '. $info->getInteresVehiculo() .' <br />
                Entrada minima:  '. $info->getInteresEntrada() .' ';

            }


            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            ->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))

            ->setTo(array( $correos_array , 'cdnventas@toyocosta.com.ec' => 'Toyocosta' ))
            
            ->setContentType("text/html")

            ->setBody($body);



            if ($this->get('mailer')->send($message)) {
                return true;
            } else {
                return false;
            }

    }


    public function envioContactoAction(Request $request){


        $em = $this->getDoctrine()->getManager(); 

        if ($request->isMethod('POST')) {

            $nombre = $request->request->get('nombre');
            $apellido = $request->request->get('apellido');
            $telefono = $request->request->get('telefono');
            $email = $request->request->get('email');
            $ciudad = $request->request->get('ciudad');
            $area = $request->request->get('area');
            $requerimiento = $request->request->get('requerimiento');
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

            
            if ($requerimiento == "nuevos" || $requerimiento == "seminuevos" ) {

                $to = array('cdnventas@toyocosta.com.ec'=> 'Toyocosta');
                //$to = array('ycosquillo@celmedia.com'=> 'Toyocosta');
                $requerimiento = "Vehiculos ".$requerimiento;

            }elseif ($requerimiento == "cita") {

                $to = array('cdnpostventa@toyocosta.com.ec'=> 'Citas Talleres');
                //$to = array('ycosquillo@celmedia.com'=> 'Citas Talleres');
                $requerimiento = "Citas Talleres";

            }elseif ($requerimiento == "repuestos") {

                $to = array('rlara@toyocosta.com.ec'=> 'Repuestos');
                //$to = array('ycosquillo@celmedia.com'=> 'Repuestos');
                $requerimiento = "Repuestos";
                    
            }elseif ($requerimiento == "pintura") {
                
                $to = array('rflores@toyocosta.com.ec'=> 'Enderezada y Pintura');
                //$to = array('ycosquillo@celmedia.com'=> 'Enderezada y Pintura');
                $requerimiento = "Enderezada y Pintura";

            }elseif ($requerimiento == "montacargas") {
                
                $to = array('romero@toyocosta.com.ec'=> 'Montacargas');
                //$to = array('ycosquillo@celmedia.com'=> 'Montacargas');
                $requerimiento = "Montacargas";

            }elseif ($requerimiento == "motos") {
                
                $to = array('cramos@toyocosta.com.ec'=> 'Motos');
                //$to = array('ycosquillo@celmedia.com'=> 'Motos');
                $requerimiento = "Motoa";

            }elseif ($requerimiento == "pirelli") {
                
                $to = array('msuarez@oyocosta.com.ec'=> 'Pirelli');
                //$to = array('ycosquillo@celmedia.com'=> 'Pirelli');
                $requerimiento = "Pirelli";

            }else{

                $to = array('rfernandez@toyocosta.com.ec'=> 'Comentarios o sugerencias');
                //$to = array('ycosquillo@celmedia.com'=> 'Comentarios o sugerencias');
                $requerimiento = "Comentarios o sugerencias";
                
            }


            
            $subject = "Pedido de Informacion Contacto desde Toyocosta"; 

            $body = '<strong>Informacion de Contacto:</strong> <br /><br />               
            Nombre:  '.$info->getNombre().' <br />
            Apellido:   '. $info->getApellido() .' <br />
            Telefono:  '. $info->getTelefono() .'  <br />
            Email:  '. $info->getEmail() .' <br />
            Ciudad:  '. $info->getCiudad() .' <br />
            Area:   '. $info->getArea() .' <br />
            Requerimiento:   '. $requerimiento .' <br />
            Observacion:  '. $info->getObservaciones() .' ';


 
            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            ->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))

            //->setTo(array( $email , 'cdnventas@toyocosta.com.ec' => 'Toyocosta' ))
            ->setTo( $to )
            
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
                    'Mensaje' => "No se ha enviado mensaje"
                ), 200); //codigo de error diferente
            }
        


        }

        // return new JsonResponse(array(
        //     'codigo' => 0,
        //     'Mensaje' => "No se ha recibio por post"
        // ), 200); //codigo de error diferente

    }


    public function consultarPreciosXModeloAction(Request $request){
        $em = $this->getDoctrine()->getManager();        

        if ($request->isMethod('POST')) {
            $idModelo = $request->request->get('modeloid');
            if(!$idModelo){
                return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "No se ha recibido vehiculo"
                ), 200); //codigo de error diferente
            }

            $vehiculoModelo = $em->getRepository('CelmediaToyocostaVehiculosBundle:VehiculoModelos')->findOneBy(
                array(
                    'id' => $idModelo,
                    "estado" => 1
                )
            );

            //Obtenemos el vehiculo correspondiente al modelo seleccionado
            $vehiculo = $vehiculoModelo->getVehiculomodel();

            //Obtenemos los plazos correspondientes al vehiculo
            $vehiculoPlazos = $vehiculo->getPlazos();

            $arrayPlazos = array();

            foreach ($vehiculoPlazos as $plazo) {
                if ($plazo->getEstado() == 1) {

                    array_push($arrayPlazos, array(
                        'id' => $plazo->getId(),
                        'nombre' => $plazo->getNombre(),
                        'valor' => $plazo->getValor()
                    ) );
                }
            }


            $variableVehiculo = $em->getRepository('CelmediaToyocostaContenidoBundle:Variables')->findOneBy(
                array(
                    "id" => 1, // id 1 para vehiculos
                    "estado" => 1
                )
            );


            $baseurl = $this->getRequest()->getScheme() . '://' . $this->getRequest()->getHttpHost() . $this->getRequest()->getBasePath();
            return new JsonResponse(array(
                'codigo' => 1,
                'modelo' => $vehiculoModelo->getNombre(),
                'precio' => $vehiculoModelo->getPrecio(),
                'imagenModelo' => $baseurl . "/uploads/vehiculo/modelo/" . $vehiculoModelo->getImagenModelo(),
                'precioNeto' => $vehiculoModelo->getPrecioNeto(),
                'entradaMinima' => $vehiculoModelo->getPrecioNeto() * $variableVehiculo->getEntradaMinima(),
                'plazos' => $arrayPlazos
            ), 200);
        }

        return new JsonResponse(array(
            'codigo' => 0,
            'Mensaje' => "No se recibio por post"
        ), 200); //codigo de error diferente
    }


    public function consultarPreciosFinalesAction(Request $request){
        $em = $this->getDoctrine()->getManager();        

        if ($request->isMethod('POST')) {
            
            $idPlazo = $request->request->get('plazoid');
            $valorEntrada = floatval( $request->request->get('valorentrada') );
            $idModelo = $request->request->get('modeloid');

            if(!$idPlazo || !$idModelo){
                return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "No se ha recibido plazo o modelo"
                ), 200); //codigo de error diferente
            }

            $vehiculoPlazo = $em->getRepository('CelmediaToyocostaVehiculosBundle:Plazo')->findOneBy(
                array(
                    'id' => $idPlazo,
                    "estado" => 1
                )
            );
            $vehiculoModelo = $em->getRepository('CelmediaToyocostaVehiculosBundle:VehiculoModelos')->findOneBy(
                array(
                    'id' => $idModelo,
                    "estado" => 1
                )
            );
            $variableVehiculo = $em->getRepository('CelmediaToyocostaContenidoBundle:Variables')->findOneBy(
                array(
                    "id" => 1, // id 1 para vehiculos
                    "estado" => 1
                )
            );


            //Obtenemos el vehiculo correspondiente al modelo seleccionado
            $vehiculo = $vehiculoModelo->getVehiculomodel();

            $precioNeto = $vehiculoModelo->getPrecioNeto();
            $entradaMinima = $vehiculoModelo->getPrecioNeto() * $variableVehiculo->getEntradaMinima();

            $precioFinanciar = $vehiculoModelo->getPrecioNeto() - $valorEntrada;

            /*
                z = <?php echo $cotizar_variables['interes']; ?> / 12
                a = 1 + z
                b = $('#plazo').val()
                c = Math.pow( a , -b )
                d = 1 - c
                e = ( d ) / z
                f = ( aFinanciar / ( e ) )
                cuotasMensuales = roundNumber(f, 2);

            */
            $valorCuotas = round( ( $precioFinanciar / ( ( 1 - ( pow( (1 + ($variableVehiculo->getInteres() / 12)), -$vehiculoPlazo->getValor()) ) ) / ($variableVehiculo->getInteres() / 12) ) ) , 2);
            $precioFinal = round($valorCuotas * $vehiculoPlazo->getValor() , 2);

            return new JsonResponse(array(
                'codigo' => 1,
                'modelo' => $vehiculoModelo->getNombre(),
                'precio' => $vehiculoModelo->getPrecio(),
                'precioNeto' => $precioNeto,
                'entradaMinima' => $entradaMinima,
                'precioFinanciar' => $precioFinanciar,
                'valorCuotas' => $valorCuotas,
                'precioFinal' => $precioFinal
            ), 200);
        }

        return new JsonResponse(array(
            'codigo' => 0,
            'Mensaje' => "No se recibio por post"
        ), 200); //codigo de error diferente
    }


    public function envioCotizacionAction(Request $request){
        $em = $this->getDoctrine()->getManager();        

        if ($request->isMethod('POST')) {

            $plazoid = $request->request->get('plazoid');
            $valorentrada = floatval( $request->request->get('valorentrada') );
            $modeloid = $request->request->get('modeloid');



            $nombre = $request->request->get('nombre');
            $apellido = $request->request->get('apellido');
            $cedula = $request->request->get('cedula');
            $telefono = $request->request->get('telefono');
            $email = $request->request->get('email');
            $ciudad = $request->request->get('ciudad');
            $mensaje = $request->request->get('mensaje');


            if(!$plazoid || !$modeloid || !$valorentrada || !$nombre || !$apellido || !$cedula || !$telefono || !$email || !$ciudad || !$mensaje ){
                return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "faltan parametros"
                ), 200); //codigo de error diferente
            }

            $vehiculoPlazo = $em->getRepository('CelmediaToyocostaVehiculosBundle:Plazo')->findOneBy(
                array(
                    'id' => $plazoid,
                    "estado" => 1
                )
            );
            $vehiculoModelo = $em->getRepository('CelmediaToyocostaVehiculosBundle:VehiculoModelos')->findOneBy(
                array(
                    'id' => $modeloid,
                    "estado" => 1
                )
            );
            $variableVehiculo = $em->getRepository('CelmediaToyocostaContenidoBundle:Variables')->findOneBy(
                array(
                    "id" => 1, // id 1 para vehiculos
                    "estado" => 1
                )
            );

            // Calculos de cotizacion a la base
            $precioNeto = $vehiculoModelo->getPrecioNeto();
            $entradaMinima = $vehiculoModelo->getPrecioNeto() * $variableVehiculo->getEntradaMinima();
            $precioFinanciar = $vehiculoModelo->getPrecioNeto() - $valorentrada;
            $valorCuotas = round( ( $precioFinanciar / ( ( 1 - ( pow( (1 + ($variableVehiculo->getInteres() / 12)), -$vehiculoPlazo->getValor()) ) ) / ($variableVehiculo->getInteres() / 12) ) ) , 2);
            $precioFinal = round($valorCuotas * $vehiculoPlazo->getValor() , 2);
            

            // Creamos el objeto cotizacion

            $cotizacion = new \Celmedia\Toyocosta\VehiculosBundle\Entity\VehiculoCotizacion();

            $cotizacion->setNombre( $nombre  );
            $cotizacion->setApellido( $apellido  );
            $cotizacion->setCedula( $cedula);
            $cotizacion->setTelefono( $telefono  );
            $cotizacion->setEmail( $email  );            
            $cotizacion->setCiudad( $ciudad  );
            $cotizacion->setMensaje( $mensaje  );

            $cotizacion->setPlazo( $vehiculoPlazo );
            $cotizacion->setVehiculoModelo( $vehiculoModelo );

            $cotizacion->setValorEntrada( $valorentrada );
            $cotizacion->setInteresVehiculo( $variableVehiculo->getInteres() );
            $cotizacion->setInteresEntrada( $variableVehiculo->getEntradaMinima() );
            
            //almacenamos en la base

            $em = $this->getDoctrine()->getManager(); 
            $em->persist(  $cotizacion );
            $em->flush();

            $formulario = "formcotizacion";



            if( $this->enviarCorreo($email, $cotizacion, $formulario ) ){
                return new JsonResponse(array(
                    'codigo' => 1,
                    'Mensaje' => "El mensaje ha sido enviado"
                ), 200); //codigo de error diferente
            }else{
                return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "No se ha enviado mensaje"
                ), 200); //codigo de error diferente
            }
        }

        return new JsonResponse(array(
            'codigo' => 0,
            'Mensaje' => "No se recibio por post"
        ), 200); //codigo de error diferente
    }

    public function especificacionAction($vehiculoid){
        $em = $this->getDoctrine()->getManager();

        $vehiculo = $em->getRepository("CelmediaToyocostaVehiculosBundle:Vehiculo")->findOneBy(array(
            "id" => $vehiculoid,
            "estado" => 1
            )
        );

        /*
        $especificaciones = $em->getRepository("CelmediaToyocostaVehiculosBundle:VehiculoEspecificacion")->findBy(array(
            "id" => $vehiculoid,
            "estado" => 1
            )
        );
        */



       return $this->render('CelmediaToyocostaVehiculosBundle:Pages:especificacion.html.twig', array(
            "vehiculo" => $vehiculo,
            //"especificaciones" => $especificaciones
        ));
    }

    public function imprimirVariableDebug($variable){
        echo "<pre>";
        print_r($variable);
        echo "</pre>";
    }

    public function ajaxUploadFormDataAction()
    {
        $request = $this->get('request');
        $uploaded_file = $request->files->get('rcv');
        $path = 'uploads/rrhh/';
        $filename = "";

        if ($uploaded_file)
        {

            foreach($uploaded_file as $part) {
                //$filename = $part->getClientOriginalName();
                //$part->move($path, $filename);

                $uploaded_file_info = pathinfo($part->getClientOriginalName());
                //$filename = uniqid() . "." .$uploaded_file_info['extension'];
                $filename = uniqid() . "-" . $part->getClientOriginalName();
                $part->move($path, $filename);
            }

            $response = 'success';
        }

        else $response = 'error';

        //$response = new Response(json_encode(array('response'=>$response)));
        //$response->headers->set('Content-Type', 'application/json');
        //return $response;

        return new JsonResponse(array(
            'response' => $response,
            "rutaarchivo" => $path . $filename
        )); //codigo de error diferente
    }

    public function envioRrhhAction(Request $request){
        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {

            $nombre = $request->request->get('nombre');
            $apellido = $request->request->get('apellido');
            $telefono = $request->request->get('telefono');
            $email = $request->request->get('email');
            $cargo = $request->request->get('cargo');
            $curriculum = $request->request->get('rutacv');

            
            if(!$nombre || !$apellido || !$telefono || !$email || !$cargo || !$curriculum  ){
                return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "faltan parametros"
                ), 200); //codigo de error diferente
            }
            

            // Creamos el objeto rrhh
            $rrhh = new \Celmedia\Toyocosta\ContenidoBundle\Entity\InfoRecursosHumanos();

            $rrhh->setNombre( $nombre  );
            $rrhh->setApellido( $apellido  );
            $rrhh->setTelefono( $telefono  );
            $rrhh->setEmail( $email  );
            $rrhh->setCargo( $cargo  );
            $rrhh->setCurriculum( $curriculum );
            
            //almacenamos en la base

            $em = $this->getDoctrine()->getManager(); 
            $em->persist(  $rrhh );
            $em->flush();




            $subject = "Recursos Humanos desde Toyocosta";
            $body = '<strong>Informaci&oacute;n del Recursos Humanos:</strong> <br /><br />
            Nombre:  '.$rrhh->getNombre().' <br />
            Apellido:   '. $rrhh->getApellido() .' <br />
            Telefono:  '. $rrhh->getTelefono() .'  <br />
            Email:  '. $rrhh->getEmail() .' <br />
            Cargo aplicado:  '. $rrhh->getCargo() .' <br />';
      

            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            //->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))
            ->setFrom(array('ycosquillo@celmedia.com' => 'Web Toyocosta'))

            //->setTo(array( $email => 'Recurso' , 'lrugel@toyocosta.com.ec' => 'Toyocosta'))
            ->setTo(array(  $email => 'Recurso' , 'ycosquillo@celmedia.com' => 'Admin'))
            
            ->setContentType("text/html")

            ->setBody($body)

            ->attach(\Swift_Attachment::fromPath( $rrhh->getCurriculum() ));


            $envioMail = $this->get('mailer')->send($message);

            // $transport = $this->container->get('mailer')->getTransport();
            // $spool = $transport->getSpool();
            // $spool->flushQueue($this->container->get('swiftmailer.transport.real'));


            if ( $envioMail ) {
                 return new JsonResponse(array(
                    'codigo' => 1,
                    'Mensaje' => "El mensaje ha sido enviado"
                ), 200); //codigo de error diferente
            } else {
                 return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "No se ha enviado mensaje"
                ), 200); //codigo de error diferente
            }
        }

        return new JsonResponse(array(
            'codigo' => 0,
            'Mensaje' => "No se recibio por post"
        ), 200); //codigo de error diferente
    }

    public function envioMantenimientoAction(Request $request){

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
            $observaciones = $request->request->get('observaciones');
            $tallerid = $request->request->get('taller');
            $comentario = $request->request->get('comentario');
            //$vehiculoid = $request->request->get('modelo');
            $modelo = $request->request->get('modelo');
            $kilometraje = $request->request->get('kilometraje');
            $regalo = $request->request->get('regalo');


            $seleccionoRegalo = $request->request->get('selectedRegalo');



            if(!$nombre || !$apellido || !$telefono || !$email || !$celular || !$fecha || !$reservaid || !$observaciones || !$tallerid ){
                return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "faltan parametros"
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

            if ($seleccionoRegalo !== "si" ) {

                // $premio =  "Premio: No selecciono regalo";
                $premio =  " ";

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

            // if($vehiculoid){
            //     $vehiculo = $em->getRepository('CelmediaToyocostaVehiculosBundle:Vehiculo')->findOneBy(
            //         array(
            //             'id' => $vehiculoid,
            //             "estado" => 1
            //         )
            //     );
            //     $mantenimiento->setModelo( $vehiculo->getNombre() );
            //     $mantenimiento->setKilometros( $kilometraje );

            //     $extraMensaje = " Modelo:  ".$mantenimiento->getModelo()." <br />
            //     Kilometraje:  ".$mantenimiento->getKilometros();

            // }else{

            //     $extraMensaje = " Comentario:  ".$mantenimiento->getComentarios();
            // }
           
            if($modelo){
                
                
                $mantenimiento->setModelo( $modelo );
                $mantenimiento->setKilometros( $kilometraje );

                $extraMensaje = " Modelo:  ".$mantenimiento->getModelo()." <br />
                Kilometraje:  ".$mantenimiento->getKilometros();

            }else{

                $extraMensaje = " Comentario:  ".$mantenimiento->getComentarios();
            }
           


            $registro = new \Celmedia\Toyocosta\ContenidoBundle\Entity\Registro();

            $registro->setEstado(1);

            if($regalo){
                
                $registro->setObsequio( $obsequio );

            }

            $registro->setCita($mantenimiento);


            $em->persist(  $mantenimiento );
            $em->persist(  $registro );
            $em->flush();



            $arrayCorreo = array( $email => 'Usuario' );


            foreach ( $taller->getContactos() as $item) {

                array_push($arrayCorreo, $item->getEmail() );

            }


            $subject = "Cita de Mantenimiento desde Toyocosta";
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

            // ->attach(\Swift_Attachment::fromPath('http://www.toyocosta.com/web/img/banner.png'));


            // if ($taller == "Oficina Matriz" || $taller == "Agencia Orellana" ) {
                

            //     $attachment = \Swift_Attachment::fromPath('http://www.toyocosta.com/web/img/citaagendaobsequio.jpg');
            //     // // Attach it to the message
            //     $message->attach($attachment);


            // }


            $envioMail = $this->get('mailer')->send($message);


            if ( $envioMail ) {
                 return new JsonResponse(array(
                    'codigo' => 1,
                    'Mensaje' => "El mensaje ha sido enviado"
                ), 200); //codigo de error diferente
            }else {
                 return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "No se ha enviado mensaje"
                ), 200); //codigo de error diferente
            }
        

        }

        return new JsonResponse(array(
            'codigo' => 0,
            'Mensaje' => "No se recibio por post"
        ), 200); //codigo de error diferente
    }

}
