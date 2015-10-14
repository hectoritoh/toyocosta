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


    // LANDINGS 08/12/2014


    public function navGreenAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:navGreen.html.twig');
    }


    public function navSeoAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:navSeo.html.twig');
    }


    public function navBlackAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:navBlack.html.twig');
    }


    public function navCeoAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:navCeo.html.twig');
    }


    // LANDINGS 10/12/2014


    public function finanBlackAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:finanBlack.html.twig');
    }


    public function finanSolAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:finanSoluciones.html.twig');
    }
    //LANDINGS 30/01/2015
    
    public function compraUsadosAction(){


        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:compra.html.twig');
    }

    public function compraBumeranAction(){


        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:compraBumeran.html.twig');
    }

    public function compraFacebookAction(){


        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:compraFacebook.html.twig');
    }
    public function compraGoogleAction(){


        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:compraGoogle.html.twig');
    }
    public function compraBlackAction(){


        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:compraBlack.html.twig');
    }



    public function movilidadAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:movilidad.html.twig');
    }

    // 18-02-2015

    public function confiableBumeranAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:cfbumeran.html.twig');
    }
    public function confiableDataAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:cfdata.html.twig');
    }
    public function confiablePatioAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:cfpatio.html.twig');
    }
    public function confiableAutosAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:cfautos.html.twig');
    }
    public function confiableFaceAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:cfface.html.twig');
    }
    public function confiableUniversoAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:cfuniverso.html.twig');
    }

    // 01-04-2015
    public function confiableUsadosAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:usadoscompra.html.twig');
    }


    public function mailingCuotasAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:cuotas.html.twig');
    }

    
    public function rsAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:redsocial.html.twig');
    }

    public function exoneradosAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:lpexonerados.html.twig');
    }

    public function mailingNavidadAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:navidadToyota.html.twig');
    }

    // 26/06/2015
    public function pirelliAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:pirelli.html.twig');   
    }
    
        public function motosAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:motos.html.twig');   
    }
    
        public function tallerAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:taller.html.twig');   
    }
    
        public function promoAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:promo.html.twig');   
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

            // campos extras

            $modelo = $request->request->get('modelo');
            $anio = $request->request->get('anio');
            $ciudad = $request->request->get('ciudad');
            $precio = $request->request->get('precio');


            // campos extras

            $direccion = $request->request->get('direccion');
            $exoneracion = $request->request->get('exoneracion');

            // campos extras

            $modeloexo = $request->request->get('modeloexonerados');
            $tipoexo = $request->request->get('tipoexonerados');

            // lp taller movil cambio de correo
            $taller = $request->request->get('taller');
            $fecha = $request->request->get('fecha');



            $info = new \Celmedia\Toyocosta\ContenidoBundle\Entity\InfoLandings();

            $info->setNombre( $nombre  );
            $info->setApellido( $apellido  );
            $info->setTelefono( $telefono  );
            $info->setEmail( $email  );
            $info->setCedula( $cedula  );
            $info->setCelular( $celular  );
            $info->setComentarios( $comentario  );
            $info->setCampana( $campana  );
            
            $extraMensaje0 = " ";

            $extraMensaje1 = " ";

            $extraMensaje2 = " ";

            $extraMensaje3 = " ";

            $extraMensaje4 = " ";

            if ( $fecha && $taller ) {
                
                $extraMensaje0 = " Fecha Tentativa:  ".$fecha;
            }
            
            if ( $modelo && $anio ) {

                $info->setModelo( $modelo  );
                $info->setAnio( $anio  );

                $extraMensaje1 = " Modelo:  ".$modelo." <br />
                Año:  ".$anio;
            }

            if ( $ciudad && $precio ){

                $info->setCiudad( $ciudad  );
                
                $extraMensaje2 = " Ciudad:  ".$ciudad." <br />

                Precio Esperado:  ".$precio;

            }
            

            if ( $direccion && $exoneracion ){

               
                $extraMensaje3 = " Ciudad:  ".$ciudad." <br /> 

                Dirección:  ".$direccion." <br />

                Tipo de exoneración:  ".$exoneracion;

            }

            if ( $tipoexo && $modeloexo ){

               
                $extraMensaje4 = " Modelo:  ".$modeloexo." <br /> 

                Tipo de Exoneración:  ".$tipoexo;

            }


            // $em = $this->getDoctrine()->getManager(); 
            $em->persist(  $info );
            $em->flush();

            // Cambio de correo 

            if ($taller) {

                $to = array('tallermovil@toyocosta.com.ec'=> 'Taller Movil');
                //$to = array('ycosquillo@celmedia.com'=> 'Taller Movil');
                
            }else{

                $to = array('cdnventas@toyocosta.com.ec'=> 'Toyocosta');
                //$to = array('ycosquillo@celmedia.com'=> 'Toyocosta');
                
            }


            $subject = "Pedido de Informacion de ".$campana." desde Web Toyocosta"; 



            $body = '<strong>Información del Landing Page.</strong> <br /><br />
            A continuación detallamos los datos ingresados: <br /><br />              
            Nombre:  '.$info->getNombre().' <br />
            Apellido:   '. $info->getApellido() .' <br />
            Cedula:  '.$info->getCedula().' <br />
            Telefono:  '. $info->getTelefono() .'  <br />
            Email:  '. $info->getEmail() .' <br />
            Celular:  '. $info->getCelular() .' <br />
            Comentarios:  '. $info->getComentarios() .' <br />
            ' . $extraMensaje0 . ' <br />
            ' . $extraMensaje1 . ' <br />
            ' . $extraMensaje2 . ' <br />
            ' . $extraMensaje3 . ' <br />
            ' . $extraMensaje4 . ' <br />  <br /> <br />  <br /> 
            <strong>Toyocosta.</strong>';

            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            //->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))
            ->setFrom(array('web@toyocosta.com' => 'Web Toyocosta'))

            ->setTo( $to )

            //->setTo(array( $email , 'cdnventas@toyocosta.com.ec' => 'Toyocosta' ))
            
            

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