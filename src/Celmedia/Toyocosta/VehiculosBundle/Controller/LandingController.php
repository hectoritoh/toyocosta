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


    
        public function blackfridayAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:blackfriday.html.twig');   
    }


        public function blackfridaytoyotaAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:blackfridaytoyota.html.twig');   
    }

        public function navidadAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:navidad2015.html.twig');   
    }




    
        public function tallerAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:taller.html.twig');   
    }
    
        public function promoAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:promo.html.twig');   
    }


        public function promoravAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:promorav4.html.twig');   
    }


        public function hiluxSuperaAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:hilux.html.twig');   
    }

        public function hiluxFaceAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:hilux-face.html.twig');   
    }

    

        public function semiMailAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:semimail.html.twig');   
    }

        public function semiFaceAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:semiface.html.twig');   
    }

        public function montacargasAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:montacargas.html.twig');   
    }

    public function compraSeminuevoAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:compraSeminuevo.html.twig');   
    }

    public function fortunerNewAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:fortuner2017.html.twig'); 
    }

    public function innova8Action()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:innova8.html.twig'); 
    }

    public function openhouseAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:openhouse.html.twig'); 
    }

    public function gamamodelosAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:gama_toyota.html.twig'); 
    }

    public function financiadinersAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:financia_diners.html.twig'); 
    }
    public function fortunerAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:fortuner.html.twig'); 
    }
    public function priusAction()
    {
        return $this->render('CelmediaToyocostaVehiculosBundle:Landing:prius.html.twig'); 
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

            // lp montacargas - cambio de correo
            $montacargas = $request->request->get('montacargas');


            // lp venta seminuevos - subir foto de carro
            $marca = $request->request->get('marca');
            $km = $request->request->get('km');
            $foto = $request->request->get('rutacv');

            // lp open house
            $dia = $request->request->get('dia');
            $hora = $request->request->get('hora');


            //lp gama de modelos
            $vh_cotizar = $request->request->get('vh_cotizar');            


            if (!$telefono) {
                $telefono = "";
            }

            $info = new \Celmedia\Toyocosta\ContenidoBundle\Entity\InfoLandings();

            $info->setNombre( $nombre  );
            $info->setApellido( $apellido  );
            $info->setTelefono( $telefono  );
            $info->setEmail( $email  );
            $info->setCedula( $cedula  );
            $info->setCelular( $celular  );
            $info->setComentarios( $comentario  );
            $info->setCampana( $campana );
          
            
            $extraMensaje0 = " ";

            $extraMensaje1 = " ";

            $extraMensaje2 = " ";

            $extraMensaje3 = " ";

            $extraMensaje4 = " ";

            $extraMensaje5 = " ";

            $extraMensaje6 = " ";

            $extraMensaje11 = " ";

            $extraMensaje12 = " ";

            $fechatentativa = "" ;
            $modeloextra = "" ;
            $anioextra = "" ;
            $precioextra = "" ;
            $ciudadextra = "" ;

            if ( $fecha && $taller ) {
                
                $extraMensaje0 = " Fecha Tentativa:  ".$fecha;

                $fechatentativa = $fecha;
            }
            
            if ( $modelo) {

                $info->setModelo( $modelo  );

                $extraMensaje11 = " Modelo:  ".$modelo ;

                $modeloextra = $modelo;
            }

            if ( $anio ) {

                
                $info->setAnio( $anio  );

                $extraMensaje1 = " Año:  ".$anio;

                $anioextra = $anio;
            }

            if ( $precio ) {
                
                $extraMensaje12 = " Precio Esperado:  ".$precio;

                $precioextra = $precio;

            }
            if ( $ciudad ){


                    $info->setCiudad( $ciudad  );
                    
                    $extraMensaje2 = " Ciudad:  ".$ciudad;

                    $ciudadextra = $ciudad;


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

            if ( $dia && $hora ){

               
                $extraMensaje5 = " Dia de visita:  ".$dia." <br />

                Hora:  ".$hora;

            }

            if ( $vh_cotizar ){

               
                $extraMensaje6 = " Vehiculo a cotizar:  ".$vh_cotizar;

            }
            

            // $em = $this->getDoctrine()->getManager(); 
            $em->persist(  $info );
            $em->flush();

            // Cambio de correo 

            if ($taller) {

                $to = array('tallermovil@toyocosta.com.ec'=> 'Taller Movil');
                
            }elseif ($montacargas) {

                $to = array('conventos@toyocosta.com.ec'=> 'Ventas Montacargas');

            }else{

                $to = array('cdnventas@toyocosta.com.ec'=> 'Toyocosta');
                
            }


            $subject = "Pedido de Informacion de ".$campana." desde Web Toyocosta"; 

            
            
            $body = '<strong>Información del Landing Page.</strong> <br /><br />
            A continuación detallamos los datos ingresados: <br /><br />              
            Campaña:  '. $campana .' <br />
            Nombre:  '.$info->getNombre().' <br />
            Apellido:   '. $info->getApellido() .' <br />
            Cedula:  '.$info->getCedula().' <br />
            Telefono:  '. $info->getTelefono() .'  <br />
            Email:  '. $info->getEmail() .' <br />
            Celular:  '. $info->getCelular() .' <br />
            Comentarios:  '. $info->getComentarios() .' <br />
            ' . $extraMensaje5 . ' <br />
            ' . $extraMensaje6 . ' <br />
            ' . $extraMensaje11 . ' <br />
            ' . $extraMensaje12 . ' <br />
            ' . $extraMensaje0 . ' <br />
            ' . $extraMensaje1 . ' <br />
            ' . $extraMensaje2 . ' <br />
            ' . $extraMensaje3 . ' <br />
            ' . $extraMensaje4 . ' <br />  <br /> <br />  <br /> 
            <strong>Toyocosta.</strong>';


            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            ->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))

            ->setTo( $to )                
            //->setTo(array( 'ycosquillo@celmedia.com' => 'Admin' ))
                        
            ->setContentType("text/html")

            //->setBody($body);

            ->setBody(
            
            
            '
            <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
            <style type="text/css">
                .titulo {  font-family: "Lato", sans-serif; text-align:center!important; color:#DF192A!important; padding-top: 30px!important;}
                .fontt{ font-size: 25px; }
                .cuadro{ padding: 20px 20%!important; }
            </style>
  
            <div style=" width:100%; background: #efefef!important">
                <h1  class="titulo"><b>Nuevo Registro desde Landing Page "'.$campana.' "<br/></b></h1>
                
                <div class="cuadro">
                   <div style="padding: 30px!important ; text-align: left!important;  background: #ffffff!important;">
                    
                    <strong class="fontt">INFORMACIÓN DEL USUARIO:</strong> 

                    <table style="width: 100%!important;"   border=1  bordercolor="ffffff"> 

                         <tr  >
                            <td style="width: 30%!important;">
                            <b> Nombre: </b>
                            </td>
                            <td style="width: 80%!important;">
                             '.$nombre.' 
                            </td>
                          </tr>
                          
                            <tr>
                            <td style="width: 30%!important;">
                            <b> Apellido: </b> 
                            </td>
                            <td  style="width: 80%!important;">
                             '. $apellido .'
                            </td>
                          </tr>
                          
                            <tr>
                            <td style="width: 30%!important;">
                             <b> Email: </b>
                            </td>
                            <td style="width: 80%!important;">
                             '. $email .'
                            </td>
                          </tr>
                          
                            <tr>
                            <td style="width: 30%!important;">
                             <b> Cédula: </b>  
                            </td>
                            <td style="width: 80%!important;" >
                              '. $cedula .'
                            </td >
                          </tr>
                          
                           <tr>
                            <td style="width: 30%!important;">
                              <b> Teléfono:  </b>
                            </td>
                            <td style="width: 80%!important;">
                              '. $telefono .' 
                            </td>
                          </tr>
                          
                          <tr>
                            <td style="width: 30%!important;">
                              <b> Celular: </b>
                            </td>
                            <td style="width: 80%!important;">
                               '. $celular .' 
                            </td>
                          </tr>
                          
                            <tr>
                            <td style="width: 30%!important;">
                             <b> Comentarios: </b>  
                            </td>
                            <td style="width: 80%!important;" >
                              '. $comentario .'
                            </td >
                          </tr>


                          <tr>
                            <td style="width: 30%!important;">
                             <b> Modelo del Vehículo: </b>  
                            </td>
                            <td style="width: 80%!important;" >
                              '. $modeloextra.'
                            </td >
                          </tr>


                          <tr>
                            <td style="width: 30%!important;">
                             <b> Año del Vehículo: </b>  
                            </td>
                            <td style="width: 80%!important;" >
                              '. $anioextra.'
                            </td >
                          </tr>
                          
                           <tr>
                            <td style="width: 30%!important;">
                             <b> Precio Esperado: </b>  
                            </td>
                            <td style="width: 80%!important;" >
                              '. $precioextra .'
                            </td >
                          </tr>

                              <tr>
                            <td style="width: 30%!important;">
                             <b> Fecha Tentativa: </b>
                            </td>
                            <td style="width: 80%!important;">
                             '. $fechatentativa .'
                            </td>
                          </tr>

                            <tr>
                            <td style="width: 30%!important;">
                             <b> Ciudad: </b>  
                            </td>
                            <td style="width: 80%!important;" >
                              '. $ciudadextra .'
                            </td >
                          </tr>



                            <br/><br/>
                                

                    </table>
                    
                    <p>
                        ' . $extraMensaje3 . ' <br />
                        ' . $extraMensaje4 . ' <br /> 
                        ' . $extraMensaje5 . ' <br /> 
                        ' . $extraMensaje6 . ' <br /> 
                    </p>
                 
                   </div>
                </div>
                
        
            </div>
            
            '
            
            );



            if ($foto) {

                // Attach it to the message
                $message->attach(\Swift_Attachment::fromPath( $foto ));
                
            }






            $message2 = \Swift_Message::newInstance()

            ->setSubject($subject)

            ->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))
            
            ->setTo( array( $email => 'Usuario' ))
            
            ->setContentType("text/html")

            ->setBody(            
            
            '
            <img style="margin: 0 auto;" src="http://www.toyocosta.com/web/uploads/mail-agradecimiento.jpg">
            '  
            
            );

            

            $envioMail2 = $this->get('mailer')->send($message2);
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