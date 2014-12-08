<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Input;



class LandingController extends Controller
{

	public function etiquetaSeoAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:etiquetaSeo.html.twig');
    }

    public function etiquetaInnventoAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:etiquetaInnvento.html.twig');
    }

    public function etiquetaBumeranAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:etiquetaBumeran.html.twig');
    }

    public function etiquetaUrbanoAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:etiquetaUrbano.html.twig');
    }
    
    public function etiquetaFacebookAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:etiquetaFacebook.html.twig');
    }
    
    public function etiquetaGoogleAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:etiquetaGoogle.html.twig');
    }

    public function mailingEtiquetaAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Mailing:etiqueta.html.twig');
    }

    
	// LANDINGS 17/11/2014


    public function rentBumeranAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:rentBumeran.html.twig');
    }

    public function ravSeowebmasterAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:ravSeowebmaster.html.twig');
    }

    public function yarisSolucionesAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:yarisSoluciones.html.twig');
    }
    
    public function yarisInventoAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:yarisInvento.html.twig');
    }
    
    public function seminuevoBumeranAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:seminuevoBumeran.html.twig');
    }


    public function navidadBannerAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:navidadBanner.html.twig');
    }
    
    // LANDINGS 01/12/2014


    public function financiamientoFaceAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:financiamiento.facebook.html.twig');
    }


    public function navidadFaceAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:navidad.facebook.html.twig');
    }

    

	public function envioLandingAction(Request $request){

        ini_set('max_execution_time', 600);

        $em = $this->getDoctrine()->getManager();


        if ($request->isMethod('POST')) {

            $nombre = $request->request->get('nombre');
            $apellido = $request->request->get('apellido');
            $telefono = $request->request->get('telefono');
            $email = $request->request->get('email');
            $celular = $request->request->get('celular');
            $cedula = $request->request->get('cedula');
            $comentario = $request->request->get('comentario');
            $campana = $request->request->get('campana');


            $info = new \Celmedia\Toyocosta\ContenidoBundle\Entity\InfoLandings();

            $info->setNombre( $nombre  );
            $info->setApellido( $apellido  );
            $info->setTelefono( $telefono  );
            $info->setEmail( $email  );
            $info->setCedula( $cedula  );
            $info->setCelular( $celular  );
            $info->setComentarios( $comentario  );
            
            
            // $em = $this->getDoctrine()->getManager(); 
            $em->persist(  $info );
            $em->flush();



            $subject = "Pedido de Informacion de ".$campana." desde Toyocosta"; 



            $body = '<strong>Informacion del Landing Page:</strong> <br /><br />               
            Nombre:  '.$info->getNombre().' <br />
            Apellido:   '. $info->getApellido() .' <br />
            Cedula:  '.$info->getCedula().' <br />
            Telefono:  '. $info->getTelefono() .'  <br />
            Email:  '. $info->getEmail() .' <br />
            Celular:  '. $info->getCelular() .' <br />
            Comentarios:  '. $info->getComentarios() .' ';

            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            ->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))

            ->setTo(array( $email , 'cdnventas@toyocosta.com.ec' => 'Toyocosta' ))
            
            ->setContentType("text/html")

            ->setBody($body);

            $envioMail = $this->get('mailer')->send($message);


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





}