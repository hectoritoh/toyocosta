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

	
	public function envioLandingAction(Request $request){



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
            
            
            $em = $this->getDoctrine()->getManager(); 
            $em->persist(  $info );
            $em->flush();


            if( $this->enviarCorreo($email, $info, $campana ) ){
                return new JsonResponse(array(
                    'codigo' => 1,
                    'Mensaje' => "El mensaje ha sido enviado"
                ), 200); //codigo de error diferente
            }else{
                return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "No se ha recibido informacion"
                ), 200); //codigo de error diferente
            }
        }



    }



    public function enviarCorreo($correos_array, $info , $campana) {


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

        ->setFrom(array('ycosquillo@celmedia.com' => 'Web Toyocosta'))

        ->setTo(array( $correos_array , 'cdnventas@toyocosta.com' => 'Toyocosta'))
        
        ->setContentType("text/html")

        ->setBody($body);



        if ($this->get('mailer')->send($message)) {
            return true;
        } else {
            return false;
        }

    }




}