<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\Input;



class MailingController extends Controller
{


    public function mailingVentaAction(){

        return $this->render('CelmediaToyocostaVehiculosBundle:Mailing:venta_seminuevo.html.twig');
    }


}