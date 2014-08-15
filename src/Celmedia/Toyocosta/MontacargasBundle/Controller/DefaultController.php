<?php

namespace Celmedia\Toyocosta\MontacargasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Celmedia\Toyocosta\MontacargasBundle\Entity\MontacargaCotizacion;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CelmediaToyocostaMontacargasBundle:Default:index.html.twig', array('name' => $name));
    }

    public function principalAction()
    {

        $em = $this->getDoctrine()->getManager();
        
        $subcategoria = $this->getDoctrine()->getRepository('CelmediaToyocostaMontacargasBundle:Subcategoria')->findBy( array("estado"=> 1) );

   
        return $this->render('CelmediaToyocostaMontacargasBundle:Pages:principal.html.twig', array("subcategoria" => $subcategoria ));
    }




    public function obtenerSubcategoriaXCategoriaAction($categoriaId){
        $em = $this->getDoctrine()->getManager();

        // $categoria = $this->getDoctrine()->getRepository('CelmediaToyocostaMontacargasBundle:CategoriaMontacarga')->findOneBy(array("id" => $categoriaId, "estado"=> 1));
        
        $subcategorias = $this->getDoctrine()->getRepository("CelmediaToyocostaMontacargasBundle:Subcategoria")->findBy(array(
            "montacarga_categoria" => $categoriaId,
            "estado" => 1
                )
        );

        return $this->render('CelmediaToyocostaMontacargasBundle:Blocks:categoria.html.twig' , array( "subcategorias" => $subcategorias, "categoriaId" => $categoriaId ) );
    }



    public function obtenerMontacargaXSubcategoriaAction($subcategoriaId){
        $em = $this->getDoctrine()->getManager();

        
        $montacargas = $this->getDoctrine()->getRepository("CelmediaToyocostaMontacargasBundle:Montacarga")->findBy(array(
            "montacarga_subcategoria" => $subcategoriaId,
            "estado" => 1
                )
        );

        return $this->render('CelmediaToyocostaMontacargasBundle:Blocks:subcategoria.html.twig' , array( "montacargas" => $montacargas , "subcategoriaId" => $subcategoriaId ) );
    }

    



    public function postVentaAction(){

    	return $this->render('CelmediaToyocostaMontacargasBundle:Pages:post_venta.html.twig', array());
    }

    public function rentaAction(){

    	return $this->render('CelmediaToyocostaMontacargasBundle:Pages:rentas.html.twig', array());
    }

    public function tecnologiaSasAction(){

    	return $this->render('CelmediaToyocostaMontacargasBundle:Pages:tecnologia_sas.html.twig', array());
    }

    public function usadosAction(){

    	$em = $this->getDoctrine()->getManager();


        $usados = $this->getDoctrine()->getRepository("CelmediaToyocostaMontacargasBundle:MontacargaUsado")->findBy(array(
            "estado" => 1
                )
        );


        return $this->render('CelmediaToyocostaMontacargasBundle:Pages:usados.html.twig', array("usados" => $usados ));
    }

    public function productoAction( $montacargaid ){

        $em = $this->getDoctrine()->getManager();


        $montacarga = $this->getDoctrine()->getRepository("CelmediaToyocostaMontacargasBundle:Montacarga")->findOneBy(array(
            "id" => $montacargaid,
            "estado" => 1
                )
        );

        $montacargas = $this->getDoctrine()->getRepository("CelmediaToyocostaMontacargasBundle:Montacarga")->findAll();

    	return $this->render('CelmediaToyocostaMontacargasBundle:Pages:producto.html.twig', array("montacarga" => $montacarga, "montacargas" => $montacargas ));
    }





    public function enviarCorreo($correos_array, $info , $formulario) {

            if ($formulario == "montacarga") {

                $subject = "Pedido de Informacion de Montacarga desde Toyocosta"; 

                $body = '<strong>Informacion del contacto:</strong> <br /><br />               
                Nombre:  '.$info->getNombre().' <br />
                Apellido:   '. $info->getApellido() .' <br />
                Telefono:  '. $info->getTelefono() .'  <br />
                Email:  '. $info->getEmail() .' <br />
                Cedula:  '.$info->getCedula().' <br />
                Ciudad:  '. $info->getCiudad() .' <br />
                Mensaje:  '. $info->getMensaje() .' ';
            
            }elseif ($formulario == "usado") {
                
                $subject = "Pedido de Informacion de Montacarga Usado desde Toyocosta"; 

                $body = '<strong>Informacion del Contacto:</strong> <br /><br />               
                Nombre:  '.$info->getNombre().' <br />
                Apellido:   '. $info->getApellido() .' <br />
                Telefono:  '. $info->getTelefono() .'  <br />
                Email:  '. $info->getEmail() .' <br />
                Ciudad:  '. $info->getCiudad() .' <br />
                Area:   '. $info->getArea() .' <br />
                Observacion:  '. $info->getObservaciones() .' ';

            }

            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            ->setFrom(array('ycosquillo@celmedia.com' => 'Web Toyocosta'))

            ->setTo(array( $correos_array , 'ycosquillo@celmedia.com' => 'Toyocosta'))
            
            ->setContentType("text/html")

            ->setBody($body);



            if ($this->get('mailer')->send($message)) {
                return true;
            } else {
                return false;
            }

    }






    public function cotizacionAction(Request $request, $idmontacarga ){


        $em = $this->getDoctrine()->getManager();


        $montacarga = $this->getDoctrine()->getRepository("CelmediaToyocostaMontacargasBundle:Montacarga")->findOneBy(array(
            "id" => $idmontacarga,
            "estado" => 1
                )
        );


        $cotizacion = new MontacargaCotizacion();

        $form = $this->createFormBuilder($cotizacion)
        ->add("nombre", "text" , array("required"=> true ))
        ->add("apellido", "text" , array("required"=> true ))
        ->add("cedula", "text" , array("required"=> true,  "max_length"=> 10 ))
        ->add("email", "email" ,  array("required"=> true )) 
        ->add("telefono", "text" , array("required"=> true, "max_length"=> 10 ))  
        ->add("ciudad", "text" , array("required"=> true ))
        ->add("mensaje", "textarea" , array("required"=> true ))
        ->add('captcha', 'captcha')
        ->getForm(); 


        if ($request->isMethod('POST')) {
        

            $form->bind($request);

                
            if ($form->isValid() ) {

            
                $data = $form->getData(); 

                $email = $data->getEmail();

                $formulario = "montacarga";

                if( $this->enviarCorreo($email, $data, $formulario ) ){
                
                    $em = $this->getDoctrine()->getManager();
                    $em->persist( $data );
                    $em->flush();


                    return $this->redirect($this->generateUrl('registro_exitoso'));
                    
                }else{
                    
                    $error = "Ha ocurrido un error al enviar el mensaje. Por favor inténtelo nuevamente en unos minutos.";
                    return $this->render('CelmediaToyocostaMontacargasBundle:Pages:cotizacion.html.twig' , 
                        array( "montacarga" => $montacarga , "form"=> $form->createView(), "error" => $error )
                        );

                }



            }else{

                    $error = "El codigo no coincide";
                    return $this->render('CelmediaToyocostaMontacargasBundle:Pages:cotizacion.html.twig' , 
                        array( "montacarga" => $montacarga , "form"=> $form->createView(), "error" => $error )
                        );

            }



        }

        return $this->render('CelmediaToyocostaMontacargasBundle:Pages:cotizacion.html.twig', array("montacarga" => $montacarga , "form"=> $form->createView() , "error" => false ));
    }
}
