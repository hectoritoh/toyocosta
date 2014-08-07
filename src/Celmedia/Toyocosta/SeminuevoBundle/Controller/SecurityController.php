<?php

namespace Celmedia\Toyocosta\SeminuevoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContext;

use Symfony\Component\Security\Core\User\UserProviderInterface;


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
        ->add("email", "email" ,  array("required"=> true ))   
        ->add("username", "text" , array("required"=> true ))
        ->add("password", "repeated" , array(
            'type' => 'password',
            'invalid_message' => 'las contrasenias deben coincidir.',
            'options' => array('attr' => array('class' => 'password-field')),
            'required' => true,
            'first_options'  => array('label' => 'Password'),
            'second_options' => array('label' => 'Repita Password'),
            ))
        ->add('captcha', 'captcha')
        ->getForm(); 



        if ($request->isMethod('POST')) {
        
            //$user = $this->get('fos_user.user_manager')->findUserByEmail($email);

            $form->bind($request);

            
            $data = $form->getData(); 

            $username = $data->getUserName();

            $email = $data->getEmail();


            $em = $this->getDoctrine()->getManager();

            $existe_username = $em->getRepository('ApplicationSonataUserBundle:User')->findOneBy(array("username"=> $username ));

            $existe_email = $em->getRepository('ApplicationSonataUserBundle:User')->findOneBy(array("email"=> $email ));
           

            if ( !($existe_email) && !($existe_username) ) {
               
                
                if ($form->isValid() ) {



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

                    $error = "Codigo o Contraseñas no coinciden";
                    return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:register.html.twig' , 
                        array("form"=> $form->createView(), "error" => $error)
                        );
                    //print_r($form->getErrors());


                    // foreach($form->getErrors() as $e) {
                    //   echo $e->__toString();          
                    // }

                }


            } else {
               
               $error = "Usuario o email ya registrados";
                return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:register.html.twig' , 
                    array("form"=> $form->createView(), "error" => $error)
                    );
            }
            

            // if ($form->isValid() && !($existe_email) && !($existe_username) ) {



            //     $factory = $this->get('security.encoder_factory');

            //     $encoder = $factory->getEncoder($usuario);

            //     $pass = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
            //     $usuario->setPassword(  $pass );
            //     $usuario->setEnabled( 0 );

            //     $em = $this->getDoctrine()->getManager();
            //     $em->persist( $usuario );
            //     $em->flush();

            //     return $this->redirect($this->generateUrl('registro_exitoso'));

            // }else{
            //     print_r($form->getErrors());
            //     $error = "Usuario o email ya registrados";
            //     return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:register.html.twig' , 
            //         array("form"=> $form->createView(), "error" => $error)
            //         );
            // }


        }



        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:register.html.twig' , 
            array("form"=> $form->createView() , "error" => false )
            );
    }

    public function registerAsStudentAction(Request $request)
    {
        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('acme.user_form_factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(true);

        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, new UserEvent($user, $request));

        $form = $formFactory->getStudentRegistrationForm();
        $form->setData($user);

        if ('POST' === $request->getMethod()) {
            $form->bind($request);

            if ($form->isValid()) {
                $event = new FormEvent($form, $request);
                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

                $user->addRole('ROLE_STUDENT');

                $userManager->updateUser($user);


                if (null === $response = $event->getResponse()) {
                    $url = $this->get('router')->generate('fos_user_registration_confirmed');
                    $response = new RedirectResponse($url);
                }

                $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

                return $response;
            }
        }

        return $this->render('AcmeUserBundle:Registration:register_student.html.twig', array('form' => $form->createView()));
    }


    public function mensajeUserAction(){

        return $this->render('CelmediaToyocostaSeminuevoBundle:Pages:registroexitoso.html.twig');
    }




}
