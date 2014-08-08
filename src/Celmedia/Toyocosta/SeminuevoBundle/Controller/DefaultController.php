<?php
namespace Celmedia\Toyocosta\SeminuevoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\JsonResponse;

use Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo;
use Application\Sonata\MediaBundle\Entity\GalleryHasMedia;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CelmediaToyocostaSeminuevoBundle:Default:index.html.twig', array('name' => $name));
    }

    public function seminuevosAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$seminuevos = $em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findBy(array('estado_publicacion' => '1'));

        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:seminuevos.html.twig' , array( "seminuevos" => $seminuevos ));
    }


    public function getFiltrosAction( $seminuevo_modelo , $seminuevo_anio, $seminuevo_precio, $seminuevo_provincia, $seminuevo_estado )
    {

        $em = $this->getDoctrine()->getManager();
        $repository = $this->getDoctrine()->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo');

		$query1 = $repository->createQueryBuilder('mo')
			->where("mo.estado_publicacion = '1' ")
            ->groupBy('mo.modelo')
            ->orderBy('mo.modelo', 'ASC')
			->getQuery();
		$modelos = $query1->getResult();

		$query2 = $repository->createQueryBuilder('an')
			->where("an.estado_publicacion = '1' ")
            ->groupBy('an.anio')
            ->orderBy('an.anio', 'DESC')
            ->getQuery();
        $anios = $query2->getResult();

        $query3 = $repository->createQueryBuilder('pr')
            ->where("pr.estado_publicacion = '1' ")
            ->groupBy('pr.precio')
            ->orderBy('pr.precio', 'DESC')
			->getQuery();
		$precios = $query3->getResult();


		$query4 = $repository->createQueryBuilder('prov')
			->where("prov.estado_publicacion = '1' ")
            ->groupBy('prov.ubicacion')
            ->orderBy('prov.ubicacion', 'ASC')
			->getQuery();
		$provincias = $query4->getResult();

		$query5 = $repository->createQueryBuilder('es')
			->where("es.estado_publicacion = '1' ")
            ->groupBy('es.estado')
			->getQuery();
		$estados = $query5->getResult();

        return $this->render('CelmediaToyocostaSeminuevoBundle:Blocks:filtros.html.twig' ,  array( 
            "modelos" => $modelos,
            "anios" => $anios,
            "precios" => $precios,
            "provincias" => $provincias,
            "estados" => $estados,
            "seminuevo_modelo" => $seminuevo_modelo,
            "seminuevo_anio" => $seminuevo_anio,
            "seminuevo_precio" => $seminuevo_precio,
            "seminuevo_provincia" => $seminuevo_provincia,
            "seminuevo_estado" => $seminuevo_estado
        ));
    }


    public function buscadorSeminuevosAction(Request $request){

        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo');


        $modelo = $request->get('selectmodelo');
        $anio = $request->get('selectanio');
        $precio = $request->get('selectprecio');
        $provincia = $request->get('selectprovincia');
        $estado = $request->get('selectestado');

        $querySM = $repository->createQueryBuilder('sm')
            ->where("sm.estado_publicacion = '1' ");

        if($modelo){
            $querySM->andWhere("sm.modelo LIKE :modelo")
            ->setParameter('modelo', '%' . $modelo . '%');
        }
        if($anio){
            $querySM->andWhere("sm.anio = :anio")
            ->setParameter('anio', $anio);
        }
        if($precio){
            $querySM->andWhere("sm.precio <= :precio ")
            ->setParameter('precio', $precio);
        }
        if($provincia){
            $querySM->andWhere("sm.ubicacion LIKE :provincia ")
            ->setParameter('provincia', '%' . $provincia . '%');
        }
        if($estado){
            $querySM->andWhere("sm.estado = :estado ")
            ->setParameter('estado', $estado);
        }

        $seminuevos = $querySM->getQuery()->getResult();



        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:seminuevos.html.twig', array(
                "seminuevos" => $seminuevos,
                "seminuevo_modelo" => $modelo,
                "seminuevo_anio" => $anio,
                "seminuevo_precio" => $precio,
                "seminuevo_provincia" => $provincia,
                "seminuevo_estado" => $estado
            )
        );
    }

    public function vendaUsadoAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$colores =$em->getRepository('CelmediaToyocostaContenidoBundle:Color')->findAll();

        $seminuevos =$em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findBy(array('estado_publicacion' => '1'));

        // $builder->add('media', 'sonata_media_type', array(
        //      'provider' => 'sonata.media.provider.image',
        //      'context'  => 'default'
        // ));
        $seminuevo = new Seminuevo();

        // create the form
        $form = $this->createFormBuilder($seminuevo)
            ->add('imagenes', 'sonata_type_collection', array(
                'cascade_validation' => true,
                ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
                'link_parameters' => array('context' => 'default'),
                'admin_code' => 'sonata.media.provider.image'
                )
            )
            ->getForm();
        // $builder->add('imagenes', 'sonata_media_type', array(
        //      'provider' => 'sonata.media.provider.image',
        //      'context'  => 'default'
        // ));

        

        

        if ($request->isMethod('POST')) {
            $form->bind($request);

            // do stuff ...
        }

        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:vendausado.html.twig' , array( "seminuevos" => $seminuevos , "colores" => $colores, "form"=> $form->createView() ));


    }

    public function estadoUsadoAction()
    {

        $securityContext = $this->container->get('security.context');
        $em = $this->getDoctrine()->getManager();


         // **********USUARIO AUTENTIFICADO********

        if( $securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED') ){
            $usuario = $securityContext->getToken()->getUser();
            
            $seminuevos = $em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findBy(array("username"=> $usuario->getUsername(), "estado_publicacion" => "1"));

            return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:estadousado.html.twig' , array( "seminuevos" => $seminuevos ));

        }else{
            return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:estadousado.html.twig' , array() );
        }           
    }


    public function cotizadorSNAction($seminuevoid){

        $em = $this->getDoctrine()->getManager();

        $seminuevo = $em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findOneBy(array("id"=> $seminuevoid, "estado_publicacion" => "1"));

        $seminuevoPlazo = $em->getRepository('CelmediaToyocostaVehiculosBundle:Plazo')->findBy(
            array(
                "estado" => 1
            )
        );

        $variableSeminuevo = $em->getRepository('CelmediaToyocostaContenidoBundle:Variables')->findOneBy(
            array(
                "id" => 2, // id 2 para seminuevos
                "estado" => 1
            )
        );

        $entradaMinima = $seminuevo->getPrecio() * $variableSeminuevo->getEntradaMinima();


        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:cotizador.html.twig' , array(
            "seminuevo" => $seminuevo,
            'entradaMinima' => $entradaMinima,
            'seminuevoPlazo' => $seminuevoPlazo,
        ));

    }

    public function consultarPreciosFinalesAction(Request $request){
        $em = $this->getDoctrine()->getManager();        

        if ($request->isMethod('POST')) {
            
            $idPlazo = $request->request->get('plazoid');
            $valorEntrada = floatval( $request->request->get('valorentrada') );
            $idSeminuevo = $request->request->get('seminuevoid');

            if(!$idPlazo || !$idSeminuevo){
                return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "No se ha recibido plazo o modelo"
                ), 200); //codigo de error diferente
            }

            $seminuevoPlazo = $em->getRepository('CelmediaToyocostaVehiculosBundle:Plazo')->findOneBy(
                array(
                    'id' => $idPlazo,
                    "estado" => 1
                )
            );

            $seminuevo = $em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findOneBy(
                array(
                    "id"=> $idSeminuevo,
                    "estado_publicacion" => "1"
                )
            );

            $variableSeminuevo = $em->getRepository('CelmediaToyocostaContenidoBundle:Variables')->findOneBy(
                array(
                    "id" => 2, // id 2 para seminuevos
                    "estado" => 1
                )
            );


            //Obtenemos el vehiculo correspondiente al modelo seleccionado
            $precioNeto = $seminuevo->getPrecio();
            $entradaMinima = $seminuevo->getPrecio() * $variableSeminuevo->getEntradaMinima();

            $precioFinanciar = $seminuevo->getPrecio() - $valorEntrada;

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
            $valorCuotas = round( ( $precioFinanciar / ( ( 1 - ( pow( (1 + ($variableSeminuevo->getInteres() / 12)), -$seminuevoPlazo->getValor()) ) ) / ($variableSeminuevo->getInteres() / 12) ) ) , 2);
            $precioFinal = round($valorCuotas * $seminuevoPlazo->getValor() , 2);

            return new JsonResponse(array(
                'codigo' => 1,
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
            $valorEntrada = floatval( $request->request->get('valorentrada') );
            $seminuevoid = $request->request->get('seminuevoid');
            $nombre = $request->request->get('nombre');
            $apellido = $request->request->get('apellido');
            $cedula = $request->request->get('cedula');
            $telefono = $request->request->get('telefono');
            $email = $request->request->get('email');
            $ciudad = $request->request->get('ciudad');
            $mensaje = $request->request->get('mensaje');

            //$cadena = "plazoid: " . $plazoid . "valorEntrada: " . $valorEntrada . "seminuevoid: " . $seminuevoid . "nombre: " . $nombre . "apellido: " . $apellido . "cedula: " . $cedula . "telefono" . $telefono . "email" . $email . "ciudad" . $ciudad . "mensaje" . $mensaje;
            

            if(!$plazoid || !$seminuevoid || !$valorEntrada || !$nombre || !$apellido || !$cedula || !$telefono || !$email || !$ciudad || !$mensaje ){
                return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "faltan parametros"
                ), 200); //codigo de error diferente
            }

            $seminuevoPlazo = $em->getRepository('CelmediaToyocostaVehiculosBundle:Plazo')->findOneBy(
                array(
                    'id' => $plazoid,
                    "estado" => 1
                )
            );

            $seminuevo = $em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findOneBy(
                array(
                    "id"=> $seminuevoid,
                    "estado_publicacion" => "1"
                )
            );

            $variableSeminuevo = $em->getRepository('CelmediaToyocostaContenidoBundle:Variables')->findOneBy(
                array(
                    "id" => 2, // id 2 para seminuevos
                    "estado" => 1
                )
            );

            // Calculos de cotizacion a la base
            $precioNeto = $seminuevo->getPrecio();
            $entradaMinima = $seminuevo->getPrecio() * $variableSeminuevo->getEntradaMinima();
            $precioFinanciar = $seminuevo->getPrecio() - $valorEntrada;
            $valorCuotas = round( ( $precioFinanciar / ( ( 1 - ( pow( (1 + ($variableSeminuevo->getInteres() / 12)), -$seminuevoPlazo->getValor()) ) ) / ($variableSeminuevo->getInteres() / 12) ) ) , 2);
            $precioFinal = round($valorCuotas * $seminuevoPlazo->getValor() , 2);
            

            // Creamos el objeto cotizacion

            $cotizacion = new \Celmedia\Toyocosta\SeminuevoBundle\Entity\SeminuevoCotizacion();

            $cotizacion->setNombre( $nombre  );
            $cotizacion->setApellido( $apellido  );
            $cotizacion->setCedula( $cedula);
            $cotizacion->setTelefono( $telefono  );
            $cotizacion->setEmail( $email  );            
            $cotizacion->setCiudad( $ciudad  );
            $cotizacion->setMensaje( $mensaje  );

            //$cotizacion->setPlazo( $vehiculoPlazo );
            //$cotizacion->setVehiculoModelo( $seminuevo );

            //$cotizacion->setValorEntrada( $valorentrada );
            //$cotizacion->setInteresVehiculo( $variableSeminuevo->getInteres() );
            //$cotizacion->setInteresEntrada( $variableSeminuevo->getEntradaMinima() );
            
            //almacenamos en la base

            $em = $this->getDoctrine()->getManager(); 
            $em->persist(  $cotizacion );
            $em->flush();

            $subject = "Pedido de Informacion Cotización de Seminuevos desde Toyocosta"; 

            $body = '<strong>Informacion del Cotizacion de Seminuevos:</strong> <br /><br />               
            Nombre:  '.$cotizacion->getNombre().' <br />
            Apellido:   '. $cotizacion->getApellido() .' <br />
            Cedula:  '.$cotizacion->getCedula().' <br />
            Telefono:  '. $cotizacion->getTelefono() .'  <br />
            Email:  '. $cotizacion->getEmail() .' <br />
            Ciudad:  '. $cotizacion->getCiudad() .' <br />
            Mensaje:  '. $cotizacion->getMensaje() .' <br />
            Plazo:  '. $seminuevoPlazo->getValor() .' meses  <br />
            Seminuevo:  '. $seminuevo->getModelo() .' <br />
            Valor de entrada:  '. $valorEntrada .' <br />
            Interes del vehiculo:  '. $variableSeminuevo->getInteres() .' <br />
            Entrada minima:  '. $entradaMinima .' ';


            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            ->setFrom(array('ycosquillo@celmedia.com' => 'Web Toyocosta'))

            ->setTo(array( $cotizacion->getEmail() => 'Usuario' , 'ycosquillo@celmedia.com' => 'Toyocosta'))
            
            ->setContentType("text/html")

            ->setBody($body);



            if ($this->get('mailer')->send($message)) {
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

    /*
    
    public function estadoUsadoAction()
    {
        $em = $this->getDoctrine()->getManager();
        $seminuevo =$em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findOneBy(array("id"=> 1));

        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:estadousado.html.twig' , array( "seminuevo" => $seminuevo ));
    }
    
    */


    public function enviarCorreo($correos_array, $seminuevo ) {


            // $pathArchivoPill = __DIR__ . '/../../../../web/uploads/seminuevos/' . $pill->getImagen();
            $colores = $seminuevo->getColores();




            $message = \Swift_Message::newInstance()
                ->setSubject('Venta de Seminuevo desde Toyocosta ')

                ->setFrom(array('ycosquillo@celmedia.com' => 'Web Toyocosta'))

                ->setTo(array( $correos_array , 'ycosquillo@celmedia.com' => 'Toyocosta'))
                
                ->setContentType("text/html")

                ->setBody('Informacion de Seminuevo: <br /><br />               
                <strong>Usuario:</strong>  '.$seminuevo->getUsername().' <br />
                Modelo:   '. $seminuevo->getModelo() .' <br />
                Marca:  '. $seminuevo->getMarca() .'  <br />
                Tipo:  '. $seminuevo->getTipo() .' <br />
                kilometraje:  '. $seminuevo->getKilometraje() .' <br />
                Precio:   '. $seminuevo->getPrecio() .' <br />
                Anio:  '. $seminuevo->getAnio() .' <br />
                Ubicacion:  '. $seminuevo->getUbicacion() .' <br />
                Placa:  '. $seminuevo->getPlaca() .' <br />
                Color:   '. $colores.' '

                );
            // ->attach(\Swift_Attachment::fromPath($pathArchivoPill)->setFilename('PillBrief.png'))
            // ->setContentType("text/html");


            if ($this->get('mailer')->send($message)) {
                return true;
            } else {
                return false;
            }


    }


    public function envioUsadoAction(Request $request){



        if ($request->isMethod('POST')) {

            $usuario = $request->request->get('usuario');
            $email = $request->request->get('email');
            $modelo = $request->request->get('modelo');
            $kilometraje = $request->request->get('kilometraje');
            $marca = $request->request->get('marca');
            $tipo = $request->request->get('tipo');
            $precio = $request->request->get('precio');
            $anio = $request->request->get('anio');
            $color = $request->request->get('color');
            $ciudad = $request->request->get('ciudad');
            $placa = $request->request->get('placa');

            $foto1 = $request->request->get('foto1');
            $foto2 = $request->request->get('foto2');
            $foto3 = $request->request->get('foto3');
            $foto4 = $request->request->get('foto4');
            $foto5 = $request->request->get('foto5');
            $foto6 = $request->request->get('foto6');
            $foto7 = $request->request->get('foto7');
            $foto8 = $request->request->get('foto8');


            $em = $this->getDoctrine()->getManager();
            $vehiculo_colores =$em->getRepository('CelmediaToyocostaSeminuevoBundle:SeminuevoColores')->findOneBy(array("id"=> $color));


            $vehiculo = new \Celmedia\Toyocosta\SeminuevoBundle\Entity\Seminuevo();
            


            $vehiculo->setModelo( $modelo  );
            $vehiculo->setKilometraje( $kilometraje  );
            $vehiculo->setMarca( $marca  );
            $vehiculo->setTipo( $tipo  );
            $vehiculo->setPrecio( $precio  );
            $vehiculo->setAnio( $anio  );
            $vehiculo->setColores( $vehiculo_colores  );
            $vehiculo->setUbicacion( $ciudad );
            $vehiculo->setPlaca( $placa );

            $vehiculo->setInformacion("Informacion");
            $vehiculo->setDescripcionCorta("Descripcion");

            $vehiculo->setEstado( 1 ); // Disponible = 1
            $vehiculo->setEstadoPublicacion( 2 ); //Pendiente = 2
            $vehiculo->setUsername( $usuario );
            
            $em = $this->getDoctrine()->getManager(); 
            $em->persist(  $vehiculo );
            $em->flush();



            $this->enviarCorreo($email, $vehiculo );


            $response = array("code" => 1, "success" => true);
            
            return new Response(json_encode($response));

            
        }

    }
}
