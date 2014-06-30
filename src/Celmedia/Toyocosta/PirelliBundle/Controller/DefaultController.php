<?php
    namespace Celmedia\Toyocosta\PirelliBundle\Controller;

    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;

    class DefaultController extends Controller
    {
        public function indexAction()
        {

        	$em = $this->getDoctrine()->getManager();
    		$llantas =$em->getRepository('CelmediaToyocostaPirelliBundle:Llanta')->findBy(array("estado"=> 1, "segmento"=> "automovil"));


            return $this->render('CelmediaToyocostaPirelliBundle:Pages:pirelli.html.twig' , array( "tipo_llanta" => "automovil" ,   "llantas" => $llantas ));
        }

        public function camionetaPirelliAction()
        {

        	$em = $this->getDoctrine()->getManager();
    		$llantas =$em->getRepository('CelmediaToyocostaPirelliBundle:Llanta')->findBy(array("estado"=> 1, "segmento"=> "camioneta"));


            return $this->render('CelmediaToyocostaPirelliBundle:Pages:pirelli.html.twig' , array( "tipo_llanta" => "camioneta" ,   "llantas" => $llantas ));
        }

        public function suvPirelliAction()
        {

        	$em = $this->getDoctrine()->getManager();
    		$llantas =$em->getRepository('CelmediaToyocostaPirelliBundle:Llanta')->findBy(array("estado"=> 1, "segmento"=> "suv"));


            return $this->render('CelmediaToyocostaPirelliBundle:Pages:pirelli.html.twig' , array( "tipo_llanta" => "suv" , "llantas" => $llantas ));
        }

        public function industrialPirelliAction()
        {

        	$em = $this->getDoctrine()->getManager();
    		$llantas =$em->getRepository('CelmediaToyocostaPirelliBundle:Llanta')->findBy(array("estado"=> 1, "segmento"=> "industrial"));


            return $this->render('CelmediaToyocostaPirelliBundle:Pages:pirelli.html.twig' , array( "tipo_llanta" => "industrial" , "llantas" => $llantas ));
        }

        public function camionPirelliAction()
        {

            $em = $this->getDoctrine()->getManager();
            $llantas =$em->getRepository('CelmediaToyocostaPirelliBundle:Llanta')->findBy(array("estado"=> 1, "segmento"=> "camion"));


            return $this->render('CelmediaToyocostaPirelliBundle:Pages:pirelli.html.twig' , array( "tipo_llanta" => "camion" , "llantas" => $llantas ));
        }

        

        public function getFiltrosAction( $segmento , $llanta_modelo, $llanta_medida, $llanta_rin, $llanta_precio)
        {

            $em = $this->getDoctrine()->getManager();
            

            $repository = $this->getDoctrine()->getRepository('CelmediaToyocostaPirelliBundle:Llanta');

            // Modelos por Automovil
            $query1 = $repository->createQueryBuilder('mo')->where('mo.segmento = :segmento')->setParameter('segmento', $segmento)->groupBy('mo.modelo')->getQuery();
            $modelos = $query1->getResult();

            // Medida por Automovil
            $query2 = $repository->createQueryBuilder('med')->where('med.segmento = :segmento')->setParameter('segmento', $segmento)->groupBy('med.medida')->getQuery();
            $medidas = $query2->getResult();

            // Rin por Automovil
            $query3 = $repository->createQueryBuilder('rin')->where('rin.segmento = :segmento')->setParameter('segmento', $segmento)->groupBy('rin.rin')->getQuery();
            $rines = $query3->getResult();

            // Linea por Automovil
            // $query4 = $repository->createQueryBuilder('li')->where('li.segmento = :segmento')->setParameter('segmento', $segmento)->groupBy('li.linea')->getQuery();
            // $lineas = $query4->getResult();

            // Precio
            $query4 = $repository->createQueryBuilder('pre')->where('pre.segmento = :segmento')->setParameter('segmento', $segmento)->groupBy('pre.precio')->getQuery();
            $precios = $query4->getResult();

            // return $this->render('CelmediaToyocostaPirelliBundle:Blocks:filtros.html.twig' ,  array( "tipo_llanta" => $segmento , "modelos" => $modelos, "medidas" => $medidas, "rines" => $rines, "lineas" => $lineas, "llanta_modelo" => $llanta_modelo, "llanta_medida" => $llanta_medida, "llanta_rin" => $llanta_rin, "llanta_linea" => $llanta_linea));
            return $this->render('CelmediaToyocostaPirelliBundle:Blocks:filtros.html.twig' ,  array( "tipo_llanta" => $segmento , "modelos" => $modelos, "medidas" => $medidas, "rines" => $rines, "precios" => $precios, "llanta_modelo" => $llanta_modelo, "llanta_medida" => $llanta_medida, "llanta_rin" => $llanta_rin, "llanta_precio" => $llanta_precio));
        }




        public function buscadorPirelliAction(Request $request){
            /*

            // Código de Yuri

            $keyword = $request->get('buscar');
            $tipo_llanta = $request->get('categoria');
            $keyword = strtolower ($keyword) ;


            $em = $this->getDoctrine()->getManager();
            $qb = $em->createQueryBuilder();
            $llantas = $qb->select('n')->from('Celmedia\Toyocosta\PirelliBundle\Entity\Llanta', 'n')
                    ->where($qb->expr()->like('n.segmento', $qb->expr()->literal('%' .  $tipo_llanta . '%')))
                    ->andWhere($qb->expr()->like('n.modelo', $qb->expr()->literal('%' .  $keyword . '%')))
                    ->orWhere($qb->expr()->like('n.precio', $qb->expr()->literal('%' .  $keyword . '%')))
                    ->orWhere($qb->expr()->like('n.medida', $qb->expr()->literal('%' .  $keyword . '%')))
                    ->orWhere($qb->expr()->like('n.rin', $qb->expr()->literal('%' .  $keyword . '%')))
                    ->orWhere($qb->expr()->like('n.diseno', $qb->expr()->literal('%' .  $keyword . '%')))
                    ->orWhere($qb->expr()->like('n.linea', $qb->expr()->literal('%' .  $keyword . '%')))
                    ->getQuery()
                    ->getResult();


            return $this->render('CelmediaToyocostaPirelliBundle:Pages:pirelli.html.twig', array(
                        "tipo_llanta" => $tipo_llanta,
                        "llantas" => $llantas,
                            )
            );
            */

            
            $tipo_llanta = $request->get('categoriallanta');
            $modelo = $request->get('selectmodelo');
            $medida = $request->get('selectmedida');
            $rin = $request->get('selectrin');
            // $linea = $request->get('selectlinea');

            $precio = $request->get('selectprecio');

            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();

            $sqlQuery = "SELECT * FROM pirelli_llanta WHERE segmento='$tipo_llanta'";

            //Si el modelo existe, esta definido se agrega al query
            if($modelo){
                $sqlQuery .= " AND modelo='$modelo'";
            }

            //Si la medida existe, esta definida se agrega al query
            if($medida){
                $sqlQuery .= " AND medida='$medida'";
            }

            //Si el ri existe, esta definido se agrega al query
            if($rin){
                $sqlQuery .= " AND rin='$rin'";
            }

            //Si la linea existe, esta definida se agrega al query
            // if($linea){
            //     $sqlQuery .= " AND linea='$linea'";
            // }

            //Si precio existe, esta definida se agrega al query
            if($precio){
                $sqlQuery .= " AND precio='$precio'";
            }

            $statement = $connection->prepare($sqlQuery);
            $statement->execute();
            $llantas = $statement->fetchAll();

            return $this->render('CelmediaToyocostaPirelliBundle:Pages:pirelli.html.twig', array(
                        "tipo_llanta" => $tipo_llanta,
                        "llantas" => $llantas,
                        "llanta_modelo" => $modelo,
                        "llanta_medida" => $medida,
                        "llanta_rin" => $rin,
                        "llanta_precio" => $precio,
                    )
            );
        }


        public function filtroBuscadorPirelliAction(Request $request){

            $tipo_llanta = $request->get('categoriallanta');
            $modelo = $request->get('selectmodelo');
            $medida = $request->get('selectmedida');
            $rin = $request->get('selectrin');
            $linea = $request->get('selectlinea');
            $precio = $request->get('selectprecio');

            $em = $this->getDoctrine()->getManager();
            $connection = $em->getConnection();
            $statement = $connection->prepare("SELECT * FROM pirelli_llanta WHERE segmento = '$tipo_llanta' AND (modelo = '$modelo' OR medida = '$medida' OR rin = '$rin' OR precio = '$precio') ");
            $statement->execute();
            $llantas = $statement->fetchAll();

            return $this->render('CelmediaToyocostaPirelliBundle:Pages:pirelli.html.twig', array(
                        "tipo_llanta" => $tipo_llanta,
                        "llantas" => $llantas,
                        )
            );


            // $modelo = strtolower ($modelo) ;
            // $linea = strtolower ($linea) ;

            // $em = $this->getDoctrine()->getManager();
            // $llantas =$em->getRepository('CelmediaToyocostaPirelliBundle:Llanta')->findBy(array("estado"=> 1, "segmento"=> $tipo_llanta, "modelo"=> $modelo, "medida"=> $medida));

            // $em = $this->getDoctrine()->getManager();
            // $connection = $em->getConnection();
            // $statement = $connection->prepare("SELECT * FROM pirelli_llanta WHERE segmento='.$tipo_llanta.'");
            // $statement->execute();
            // $llantas = $statement->fetchAll();

            // $em = $this->getDoctrine()->getManager();
            // $qb = $em->createQueryBuilder();
            // $llantas = $qb->select('a')->from('Celmedia\Toyocosta\PirelliBundle\Entity\Llanta', 'a')
            //         ->where($qb->expr()->like('a.segmento', $qb->expr()->literal('%' .  $tipo_llanta . '%')))
            //         ->getQuery()
            //         ->getResult();





        }


        public function informacionPirelliAction($id_llanta){

            $llanta = $this->getDoctrine()->getRepository("CelmediaToyocostaPirelliBundle:Llanta")->findOneBy(array(
                "id" => $id_llanta
                    )
            );

            return $this->render('CelmediaToyocostaPirelliBundle:Pages:informacion.pirelli.html.twig', array("llanta" => $llanta));

        }

        public function distribuidoresPirelliAction(){

            $em = $this->getDoctrine()->getManager();
            $distribuidores =$em->getRepository('CelmediaToyocostaPirelliBundle:Distribuidor')->findBy(array("estado"=> 1));


            return $this->render('CelmediaToyocostaPirelliBundle:Pages:distribuidor.pirelli.html.twig', array("distribuidores"=> $distribuidores));        
        }


        public function enviarCorreo($correos_array, $contacto ) {


                // $pathArchivoPill = __DIR__ . '/../../../../web/uploads/pills/' . $pill->getImagen();
                $id_llanta = $contacto->getLlanta();

                $llanta =  $this->getDoctrine()->getRepository("CelmediaToyocostaPirelliBundle:Llanta")->findOneBy(array(
                    "id" => $id_llanta
                        )
                );
                
                $modelo = $llanta->getModelo();


                $message = \Swift_Message::newInstance()
                    ->setSubject('Pedido de informacion desde Toyocosta /  Pirelli')

                    ->setFrom(array('ycosquillo@celmedia.com' => 'Web Toyocosta'))

                    ->setTo(array( $correos_array , 'ycosquillo@celmedia.com' => 'Toyocosta'))

                    ->setBody('Pedido de informacion                
                    Llanta:  '.$modelo.' 
                    Nombre:   '. $contacto->getNombre() .'
                    Apellido:  '. $contacto->getApellido() .'
                    Telefono:  '. $contacto->getTelefono() .'
                    Celular:  '. $contacto->getCelular() .'
                    Email: '. $contacto->getEmail() .'
                    Cedula:  '. $contacto->getCedula() .'
                    Comentario:   '. $contacto->getComentario().' '
                    );
                // ->attach(\Swift_Attachment::fromPath($pathArchivoPill)->setFilename('PillBrief.png'))
                // ->setContentType("text/html");


                if ($this->get('mailer')->send($message)) {
                    return true;
                } else {
                    return false;
                }


        }


        public function envioInfoPirelliAction(Request $request){


            $nombre = $request->request->get('nombre');
            $apellido = $request->request->get('apellido');
            $telefono = $request->request->get('telefono');
            $celular = $request->request->get('celular');
            $email = $request->request->get('email');
            $cedula = $request->request->get('cedula');
            $comentario = $request->request->get('comentario');
            $llanta_id = $request->request->get('llanta');

            $llanta =  $this->getDoctrine()->getRepository("CelmediaToyocostaPirelliBundle:Llanta")->findOneBy(array(
                "id" => $llanta_id
                    )
            );

            $info = new \Celmedia\Toyocosta\PirelliBundle\Entity\InfoPirelli();

            $info->setNombre( $nombre  );
            $info->setApellido( $apellido  );
            $info->setTelefono( $telefono  );
            $info->setCelular( $celular  );
            $info->setEmail( $email  );
            $info->setCedula( $cedula  );
            $info->setComentario( $comentario  );
            $info->setEstado( 1 );
            $info->setLlanta( $llanta );
            
            
            $em = $this->getDoctrine()->getManager(); 
            $em->persist(  $info );
            $em->flush();


            $this->enviarCorreo($email, $info );

            echo "ok";

            return new Response();


        }


        public function mensajePirelliAction(){

            return $this->render('CelmediaToyocostaPirelliBundle:Pages:sms.enviado.pirelli.html.twig');

        }


    }
?>