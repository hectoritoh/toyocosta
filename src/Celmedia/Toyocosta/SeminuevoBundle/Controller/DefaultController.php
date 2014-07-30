<?php
namespace Celmedia\Toyocosta\SeminuevoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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

    public function obtenerCertificadosAction($seminuevoid){

        $em = $this->getDoctrine()->getManager();
        //$seminuevo = $em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findOneBy(array('id' => $seminuevoid));


        //$seminuevosCertificados = $em->getRepository('CelmediaToyocostaSeminuevoBundle:SeminuevoCertificado')->findBy(array('seminuevo' => $seminuevo));

        //return $this->render('CelmediaToyocostaSeminuevoBundle:Blocks:certificados.html.twig' , array( "seminuevosCertificados" => $seminuevosCertificados ));
        return new Response();
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

    public function vendaUsadoAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$colores =$em->getRepository('CelmediaToyocostaSeminuevoBundle:SeminuevoColores')->findAll();

        $seminuevos =$em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findBy(array('estado_publicacion' => '1'));

        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:vendausado.html.twig' , array( "seminuevos" => $seminuevos , "colores" => $colores ));
    }

    public function estadoUsadoAction()
    {
    	$em = $this->getDoctrine()->getManager();
    	$seminuevo =$em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findOneBy(array("id"=> 1));

        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:estadousado.html.twig' , array( "seminuevo" => $seminuevo ));
    }

    // public function getFormLoginAction()
    // {

    //     return $this->render('SonataUserBundle:Security:base_login.html.twig');
    // }

    // public function registerSeminuevosAction()
    // {
    //     return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:register.html.twig');
    // }

    public function enviarCorreo($correos_array, $seminuevo ) {


            // $pathArchivoPill = __DIR__ . '/../../../../web/uploads/seminuevos/' . $pill->getImagen();
            $colores = $seminuevo->getColores();




            $message = \Swift_Message::newInstance()
                ->setSubject('Venta de Seminuevo desde Toyocosta ')

                ->setFrom(array('ycosquillo@celmedia.com' => 'Web Toyocosta'))

                ->setTo(array( $correos_array , 'ycosquillo@celmedia.com' => 'Toyocosta'))

                ->setBody('Informacion de Seminuevo:                
                Usuario:  '.$seminuevo->getUsername().' 

                Modelo:   '. $seminuevo->getModelo() .'
                Marca:  '. $seminuevo->getMarca() .'
                Tipo:  '. $seminuevo->getTipo() .'
                kilometraje:  '. $seminuevo->getKilometraje() .'
                Precio:   '. $seminuevo->getPrecio() .'
                Anio:  '. $seminuevo->getAnio() .'
                Ubicacion:  '. $seminuevo->getUbicacion() .'
                Placa:  '. $seminuevo->getPlaca() .'
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
