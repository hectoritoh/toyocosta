<?php

namespace Celmedia\Toyocosta\SeminuevoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContext;

use FOS\UserBundle\Model\UserInterface;
use Application\Sonata\UserBundle\Entity\User;



class SecurityController extends Controller
{


    public function loginAction(Request $request)
    {

      $session = $request->getSession();

        // get the login error if there is one
      if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
        $error = $request->attributes->get(
            SecurityContext::AUTHENTICATION_ERROR
            );
    } else {
        $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        $session->remove(SecurityContext::AUTHENTICATION_ERROR);
    }

    return $this->render(
        'CelmediaToyocostaSeminuevoBundle:Pages:login.html.twig',
        array(
                // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
            )
        );


}


    /**
     * @Route("/login_check", name="_security_check")
     */
    public function securityCheckAction()
    {
        // The security layer will intercept this request
    }

    /**
     * @Route("/logout", name="_demo_logout")
     */
    public function logoutAction()
    {
        // The security layer will intercept this request

    }





    public function registerAction(Request $request)
    {

        // $usuario = new App\TiendaOnlineBundle\Usuario();

        $usuario = new User();


        $form = $this->createFormBuilder($usuario)
        ->add("username", "text" , array("required"=> true ))
        ->add("email", "email" ,  array("required"=> true ))   
        ->add("password", "repeated" , array(
            'type' => 'password',
            'invalid_message' => 'las contrasenias deben coincidir.',
            'options' => array('attr' => array('class' => 'password-field')),
            'required' => true,
            'first_options'  => array('label' => 'Password'),
            'second_options' => array('label' => 'Repita Password'),
            ))
        ->getForm(); 

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {

                $data = $form->getData(); 


                $factory = $this->get('security.encoder_factory');

                $encoder = $factory->getEncoder($usuario);

                $pass = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
                $usuario->setPassword(  $pass );
                $usuario->setEnabled( 0 );

                $em = $this->getDoctrine()->getManager();
                $em->persist( $usuario );
                $em->flush();

                return $this->redirect($this->generateUrl('registro_exitoso'));

            }else{
                print_r($form->getErrors());
            }
        }



        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:register.html.twig' , 
            array("form"=> $form->createView())
            );
    }

    public function mensajeUserAction(){

        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:registroexitoso.html.twig');
    }




}
