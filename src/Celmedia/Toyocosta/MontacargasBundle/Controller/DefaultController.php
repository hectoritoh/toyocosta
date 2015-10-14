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

    public function obtenerMenuPrincipalAction(){
        $em = $this->getDoctrine()->getManager();
        
        $categoriasMontacargas = $this->getDoctrine()->getRepository('CelmediaToyocostaMontacargasBundle:CategoriaMontacarga')->findBy( array("estado"=> 1) );
        return $this->render('CelmediaToyocostaMontacargasBundle:Blocks:top.submenu.html.twig', array('categoriasMontacargas' => $categoriasMontacargas ) );
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

    public function mensajeAction(){

        return $this->render('CelmediaToyocostaMontacargasBundle:Pages:envio.exitoso.html.twig');
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

        $montacargas = $this->getDoctrine()->getRepository("CelmediaToyocostaMontacargasBundle:Montacarga")->findBy(
                   array('estado' => 1),        // $where 
                   array('created' => 'DESC'),    // $orderBy
                   6,                        // $limit
                   0                          // $offset
                 );
        

        // $montacargas = $this->getDoctrine()->getRepository("CelmediaToyocostaMontacargasBundle:Montacarga")->findAll();

        // $i = 0;
        // $indices_montacargas_aleatorias = array_rand($montacargas, 2);
        // $montacargas_mostrar = array();

        // foreach ($montacargas as $item) {

        //     if (in_array($i, $indices_montacargas_aleatorias))
        //         $montacargas_mostrar[] = $item;
        // }


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
                Mensaje:  '. $info->getMensaje() .' ';

            }

            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            //->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))
            ->setFrom(array('web@toyocosta.com' => 'Web Toyocosta'))

            ->setTo(array( $correos_array , 'oromero@toyocosta.com.ec' => 'Oswaldo Romero' , 'jnarvaez@toyocosta.com.ec' => 'J. Narvaez' ))
            
            ->setContentType("text/html")

            ->setBody($body);



            if ($this->get('mailer')->send($message)) {
                return true;
            } else {
                return false;
            }

    }

    
    public function cotizacionUsadoAction(Request $request, $idusado ){


        $em = $this->getDoctrine()->getManager();


        $usado = $this->getDoctrine()->getRepository("CelmediaToyocostaMontacargasBundle:MontacargaUsado")->findOneBy(array(
            "id" => $idusado,
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
        // ->add("usado", "hidden" , array("required"=> true ))
        ->add('captcha', 'captcha')
        ->getForm(); 


        if ($request->isMethod('POST')) {
        

            $form->bind($request);

                
            if ($form->isValid() ) {

            
                $data = $form->getData(); 

                $email = $data->getEmail();
                


                $formulario = "usado";

                if( $this->enviarCorreo($email, $data, $formulario ) ){
                
                    $em = $this->getDoctrine()->getManager();
                    $em->persist( $data );
                    $em->flush();


                    return $this->redirect($this->generateUrl('envio_exitoso'));
                    
                }else{
                    
                    $error = "Ha ocurrido un error al enviar el mensaje. Por favor inténtelo nuevamente en unos minutos.";
                    return $this->render('CelmediaToyocostaMontacargasBundle:Pages:cotizacion.html.twig' , 
                        array( "usado" => $usado , "form"=> $form->createView(), "error" => $error )
                        );

                }



            }else{

                    $error = "El codigo no coincide";
                    return $this->render('CelmediaToyocostaMontacargasBundle:Pages:cotizacion.html.twig' , 
                        array( "usado" => $usado , "form"=> $form->createView(), "error" => $error )
                        );

            }



        }

        return $this->render('CelmediaToyocostaMontacargasBundle:Pages:cotizacion.html.twig', array("usado" => $usado , "form"=> $form->createView() , "error" => false ));
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


                    return $this->redirect($this->generateUrl('envio_exitoso'));
                    
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


        $banners = $this->getDoctrine()->getRepository("CelmediaToyocostaVehiculosBundle:SlidePrincipal")->findBy(array(
            "estado" => 1 , "seccion" => "seminuevo"
                )
        );

        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:seminuevos.html.twig', array(
                "seminuevos" => $seminuevos,
                "seminuevo_modelo" => $modelo,
                "seminuevo_anio" => $anio,
                "seminuevo_precio" => $precio,
                "seminuevo_provincia" => $provincia,
                "seminuevo_estado" => $estado,
                "banners" => $banners
            )
        );
    }

    
    public function monContactoAction(Request $request)
    {
    	

        $form = $this->createFormBuilder()
        ->add("nombre", "text" , array("required"=> true ))
        ->add("apellido", "text" , array("required"=> true ))
        ->add("email", "email" ,  array("required"=> true )) 
        ->add("telefono", "text" , array("required"=> true, "max_length"=> 10 ))  
        ->add("ciudad", "text" , array("required"=> true ))
        ->add("mensaje", "textarea" , array("required"=> true ))
        ->add('captcha', 'captcha')
        ->getForm(); 


        if ($request->isMethod('POST')) {
        

            $form->bind($request);

                
            if ($form->isValid() ) {

            
                //$data = $form->getData(); 




                $subject = "Pedido de Informacion de Contacto Montacarga desde Toyocosta"; 

                $body = '<strong>Informacion del Contacto:</strong> <br /><br />               
                Nombre:  '.$form->get('nombre')->getData().' <br />
                Apellido:   '. $form->get('apellido')->getData().' <br />
                Telefono:  '.$form->get('telefono')->getData() .'  <br />
                Email:  '. $form->get('email')->getData() .' <br />
                Ciudad:  '. $form->get('ciudad')->getData() .' <br />
                Mensaje:  '.$form->get('mensaje')->getData() .'<br/>
                <br/><strong>Toyocosta.</strong> ';

                $message = \Swift_Message::newInstance()

                ->setSubject($subject)

                //->setFrom(array('webtoyocosta@gmail.com' => 'Web Toyocosta'))
                ->setFrom(array('web@toyocosta.com' => 'Web Toyocosta'))

                ->setTo(array( 'oromero@toyocosta.com.ec' => 'Oswaldo Romero' , 'jnarvaez@toyocosta.com.ec' => 'J. Narvaez' ))
                
                //->setTo('ycosquillo@celmedia.com')

                ->setContentType("text/html")

                ->setBody($body);



               if( $this->get('mailer')->send($message) ) {
                
                    
                    return $this->redirect($this->generateUrl('envio_exitoso'));
                    
                }else{
                    
                    $error = "Ha ocurrido un error al enviar el mensaje. Por favor inténtelo nuevamente en unos minutos.";
                    return $this->render('CelmediaToyocostaMontacargasBundle:Pages:contacto.html.twig' , 
                        array( "form"=> $form->createView(), "error" => $error )
                        );

                }



            }else{

                    $error = "El codigo no coincide";
                    return $this->render('CelmediaToyocostaMontacargasBundle:Pages:contacto.html.twig' , 
                        array( "form"=> $form->createView(), "error" => $error )
                        );

            }



        }

        return $this->render('CelmediaToyocostaMontacargasBundle:Pages:contacto.html.twig', array( "form" => $form->createView() , "error" => false ));



    }



}
