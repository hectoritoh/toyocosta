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
    	$seminuevos =$em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findAll();

        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:seminuevos.html.twig' , array( "seminuevos" => $seminuevos ));
    }

    public function registerSeminuevosAction()
    {
    	return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:register.html.twig');
    }

    public function getFiltrosAction( $seminuevo_modelo , $seminuevo_anio, $seminuevo_precio, $seminuevo_provincia, $seminuevo_estado )
    {

        $em = $this->getDoctrine()->getManager();
        

        $repository = $this->getDoctrine()->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo');
        // Modelos
		/*$query1 = $repository->createQueryBuilder('mo')
			->where("mo.modelo LIKE :modelo ")
			->setParameter('modelo', $modelo)
			->groupBy('mo.modelo')
			->getQuery();
		$modelos = $query1->getResult();*/

		$query1 = $repository->createQueryBuilder('mo')
			->where("mo.modelo LIKE :modelo ")
			->setParameter('modelo', '%' . $seminuevo_modelo . '%')
			->getQuery();
		$modelos = $query1->getResult();

		$query2 = $repository->createQueryBuilder('an')
			->where("an.anio LIKE :anio ")
			->setParameter('anio', '%' . $seminuevo_anio . '%')
			->getQuery();
		$anios = $query2->getResult();

		$query3 = $repository->createQueryBuilder('pr')
			->where("pr.precio LIKE :precio ")
			->setParameter('precio', '%' . $seminuevo_precio . '%')
			->getQuery();
		$precios = $query3->getResult();

		$query4 = $repository->createQueryBuilder('prov')
			->where("prov.ubicacion LIKE :provincia ")
			->setParameter('provincia', '%' . $seminuevo_provincia . '%')
			->getQuery();
		$provincias = $query4->getResult();

		$query5 = $repository->createQueryBuilder('es')
			->where("es.estado = :estado ")
			->setParameter('estado', $seminuevo_estado)
			->getQuery();
		$estados = $query5->getResult();

        // return $this->render('CelmediaToyocostaPirelliBundle:Blocks:filtros.html.twig' ,  array( "tipo_llanta" => $segmento , "modelos" => $modelos, "medidas" => $medidas, "rines" => $rines, "lineas" => $lineas, "llanta_modelo" => $llanta_modelo, "llanta_medida" => $llanta_medida, "llanta_rin" => $llanta_rin, "llanta_linea" => $llanta_linea));
        return $this->render('CelmediaToyocostaSeminuevoBundle:Blocks:filtros.html.twig' ,  array( "modelos" => $modelos , "anios" => $anios, "precios" => $precios, "provincias" => $provincias, "estados" => $estados, "seminuevo_modelo" => $seminuevo_modelo, "seminuevo_anio" => $seminuevo_anio, "seminuevo_precio" => $seminuevo_precio, "seminuevo_provincia" => $seminuevo_provincia, "seminuevo_estado" => $seminuevo_estado ));
    }

    public function vendaUsadoAction()
    {

    	$em = $this->getDoctrine()->getManager();
    	$seminuevos =$em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findAll();

        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:vendausado.html.twig' , array( "seminuevos" => $seminuevos ));
    }

    public function estadoUsadoAction()
    {

    	$em = $this->getDoctrine()->getManager();
    	$seminuevo =$em->getRepository('CelmediaToyocostaSeminuevoBundle:Seminuevo')->findOneBy(array("id"=> 1));

        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:estadousado.html.twig' , array( "seminuevo" => $seminuevo ));
    }

}
