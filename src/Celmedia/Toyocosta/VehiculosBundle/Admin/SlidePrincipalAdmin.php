<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Sonata\AdminBundle\Validator\ErrorElement;

class SlidePrincipalAdmin extends Admin
{
    


    public function preUpdate( $obj ){


        if ( $obj->getImagenBanner() != null  ) {
            
            $obj->uploadImagenSlide();
            
        }

        if ( $obj->getImagenMovil() != null  ) {
            
            $obj->uploadImagenMobilBanner();
            
        }

    }




    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('link')
            ->add('descripcion')
            ->add('boton')
            ->add('estado')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('seccion', 'choice', array(
               'choices' => array(
                   'principal' => 'Banner Principal',
                   'seminuevo' => 'Banner Seminuevo',
                   'mantenimiento' => 'Banner Cita de Mantenimiento'
                   )))
            ->add('link')
                ->add('estado', 'choice', array(
           'choices' => array(
               '1' => 'Publicado',
               '0' => 'No publicado'
               )))
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $obj = $this->getSubject();

        $fileFieldOptions = array('required' => false);
        if ($obj && ($webPath = 'uploads/slide-principal/' .    $obj->getImagenBanner())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }

        $fileFieldOptions2 = array('required' => false);
        if ($obj && ($webPath = 'uploads/slide-principal/mobil/' .    $obj->getImagenMovil())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions2['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }



        $formMapper
            ->add('seccion', 'choice', array(
               'choices' => array(
                   'principal' => 'Banner Principal',
                   'seminuevo' => 'Banner Seminuevo',
                   'mantenimiento' => 'Banner Cita de Mantenimiento'
                   )))
            ->add('ImagenSlide', 'file', $fileFieldOptions)
            ->add('ImagenMobilBanner', 'file', $fileFieldOptions2)
            ->add('descripcion')
            ->add('link')
            ->add('boton')
            ->add('estado', 'choice', array(
           'choices' => array(
               '1' => 'Publicado',
               '0' => 'No publicado'
               )))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('link')
            ->add('descripcion')
            ->add('imagen_banner')
            ->add('estado')
        ;
    }




    public function validate(ErrorElement $errorElement, $object)
    {
        // conditional validation, see the related section for more information


        if ($object->getImagenBanner() === null ) {
            // nombre cannot be empty when the post is enabled
            $errorElement
                ->with('ImagenSlide')
                    ->assertNotNull()
                ->end()
            ;
                        
        }


    }



}
