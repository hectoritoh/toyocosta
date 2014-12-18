<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Provider;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\FOSUBUserProvider as BaseClass;
use Symfony\Component\Security\Core\User\UserInterface;

class FOSUBUserProvider extends BaseClass {

    /**
     * {@inheritDoc}
     */
    public function connect(UserInterface $user, UserResponseInterface $response) {
        $property = $this->getProperty($response);
        $username = $response->getUsername();

        //on connect - get the access token and the user ID
        $service = $response->getResourceOwner()->getName();

        $setter = 'set' . ucfirst($service);
        $setter_id = $setter . 'Uid';
        $setter_token = 'setToken';

        //we "disconnect" previously connected users
        if (null !== $previousUser = $this->userManager->findUserBy(array($property => $username))) {
            $previousUser->$setter_id(null);
            $previousUser->$setter_token(null);
            $this->userManager->updateUser($previousUser);
        }

        //we connect current user
        $user->$setter_id($username);
        $user->$setter_token($response->getAccessToken());

        $this->userManager->updateUser($user);
    }



    /**
     * {@inheritdoc}
     */
    public function loadUserByOAuthUserResponse(UserResponseInterface $response) {


        //$em = $this->getDoctrine()->getManager();

        //$usuarios =$this->getDoctrine()->getRepository('CelmediaToyocostaVehiculosBundle:UsuarioRedsocial')->findAll();
        


        $username = $response->getUsername();

        $user = $this->userManager->findUserBy(array($this->getProperty($response) => $username));
        //when the user is registrating
        if (null === $user) {


            $service = $response->getResourceOwner()->getName(); /// facebook twitter 



            ////   setFacebook
            ////   setFacebookId   //  $setter_id
            ////   setFacebookAccessToken

            $setter = 'set' . ucfirst($service);
            $setter_id = $setter . 'Uid';
            $setter_token =  'setToken';
        // create new user here
            $user = $this->userManager->createUser();


      


            $user->$setter_id($username);



            $user->$setter_token($response->getAccessToken());
        //I have set all requested data with the user's username
        //modify here with relevant data
            //            $username = $response->getUsername();
            //            $realname = $response->getRealName();
            $arr = $response->getResponse();
        //            echo "$service";
        //
        //            echo "<pre>";
        //            var_dump($arr);
        //            echo "</pre>";
        // 
        //
        //            die();

            if ($service == "facebook") {

                $user->setUsername($response->getUsername());
                $user->setEmail($response->getEmail());
                $user->setPassword($username);
                $user->setFacebookName($arr['name']);
                $user->setFirstName($arr['first_name']);
                $user->setLastName($arr['last_name']);
                $user->setGender($arr['gender']);
                //$user->setLink($arr['link']);
                //$user->setVerificado(false);
                //$user->setServicio("facebook");

            } 

            if ($service == "twitter") {
                $user->setPassword($username);
                $user->setEmail( $arr['screen_name'] . "@twitter.com"  );
                $user->setUsername( $arr['screen_name'] );
                $user->setTwitterName($arr['name']);
                //$user->setVerificado(false);
                //$user->setServicio("twitter");
                //                $user->setFirstName($arr['first_name']);
                //                $user->setLastName($arr['last_name']);
                //                $user->setGender($arr['gender']);
                //                $user->setLink($arr['link']);
            }
            $user->setEnabled(true);
            $this->userManager->updateUser($user);
            return $user;
        }

        //if user exists - go with the HWIOAuth way
        $user = parent::loadUserByOAuthUserResponse($response);

        $serviceName = $response->getResourceOwner()->getName();
        //$setter = 'set' . ucfirst($serviceName) . 'AccessToken';
        $setter = 'setToken';

        //update access token
        $user->$setter($response->getAccessToken());
        
        $service = $response->getResourceOwner()->getName();
       

        return $user;
    }

}
