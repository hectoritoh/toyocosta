<?php

namespace Celmedia\Toyocosta\MontacargasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

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

    	return $this->render('CelmediaToyocostaMontacargasBundle:Pages:usados.html.twig', array());
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

    public function cotizacionAction(){

        $cotizacion = new MontacargaCotizacion();

        $form = $this->createFormBuilder($cotizacion)
        ->add("nombre", "text" , array("required"=> true ))
        ->add("apellido", "text" , array("required"=> true ))
        ->add("cedula", "text" , array("required"=> true ))
        ->add("email", "email" ,  array("required"=> true )) 
        ->add("telefono", "text" , array("required"=> true ))  
        ->add("ciudad", "text" , array("required"=> true ))
        ->add("mensaje", "textarea" , array("required"=> true ))
        ->add('captcha', 'captcha')
        ->getForm(); 


        return $this->render('CelmediaToyocostaMontacargasBundle:Pages:cotizacion.html.twig', array("form"=> $form->createView() , "error" => false ));
    }
}
