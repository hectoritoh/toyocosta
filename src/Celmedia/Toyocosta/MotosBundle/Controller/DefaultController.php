<?php

namespace Celmedia\Toyocosta\MotosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($categorianombre, $categoriaid )
    {

    	$em = $this->getDoctrine()->getManager();


        $categoria = $this->getDoctrine()->getRepository('CelmediaToyocostaMotosBundle:MotoCategoria')->findOneBy(array("id" => $categoriaid, "estado"=> 1));

        $motos = $this->getDoctrine()->getRepository('CelmediaToyocostaMotosBundle:Moto')->findBy(array("categoria"=> $categoriaid , "estado" => 1));

        return $this->render('CelmediaToyocostaMotosBundle:Default:index.html.twig', array( "motos" => $motos , "categoria" => $categoria ) );
    }

    public function motoAction($categorianombre, $nombre, $id )
    {


    	$em = $this->getDoctrine()->getManager();

        $moto = $this->getDoctrine()->getRepository('CelmediaToyocostaMotosBundle:Moto')->findOneBy(array("id"=> $id , "estado" => 1));

        return $this->render('CelmediaToyocostaMotosBundle:Pages:moto.html.twig', array("moto" => $moto));
    }

    public function obtenerMotosXCategoriaAction()
    {
    	
    	$em = $this->getDoctrine()->getManager();

        $categorias = $this->getDoctrine()->getRepository('CelmediaToyocostaMotosBundle:MotoCategoria')->findBy(array("estado"=> 1));
        
        return $this->render('CelmediaToyocostaVehiculosBundle:Blocks:motos.submenu.html.twig' , array( "categorias" => $categorias ) );


    }


}
