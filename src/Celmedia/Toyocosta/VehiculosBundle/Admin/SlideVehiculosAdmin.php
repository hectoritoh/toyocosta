<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Validator\ErrorElement;


class SlideVehiculosAdmin extends Admin
{
    
    public function preUpdate( $obj ){


        if ( $obj->getImagenSlide() != null  ) {
            
            $obj->uploadFileSlide();
            
        }

        if ( $obj->getImagenThumb() != null  ) {
            
            $obj->uploadFileThumb();

        }

        if ( $obj->getLogo() != null  ) {
            
            $obj->uploadFileLogo();

        }

    }



    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('imagen_slide')
            ->add('imagen_thumb')
            ->add('menu_posicion')
            ->add('estado')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('categoria_vehiculo')
            ->add('vehiculo_slide')
            ->add('imagen_slide')
            ->add('imagen_thumb')
            ->add('menu_posicion', 'choice', array(
           'choices' => array(
               '1' => 'Derecha',
               '0' => 'Izquierda'
               )))
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

        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions = array('required' => false);
        if ($obj && ($webPath = 'uploads/slide-vehiculos/portada/' .    $obj->getImagenSlide())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }
        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions2 = array('required' => false);
        if ($obj && ($webPath = 'uploads/slide-vehiculos/bullets/' .    $obj->getImagenThumb())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions2['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }

        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions3 = array('required' => false);
        if ($obj && ($webPath = 'uploads/slide-vehiculos/logos/' .    $obj->getLogo())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions3['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }


        $formMapper        
            ->add('categoria_vehiculo')
            ->add('vehiculo_slide')
            ->add('FileSlide', 'file', $fileFieldOptions)
            ->add('FileThumb', 'file' , $fileFieldOptions2)
            ->add('FileLogo', 'file' , $fileFieldOptions3)
            ->add('menu_posicion', 'choice', array(
           'choices' => array(
               '1' => 'Derecha',
               '0' => 'Izquierda'
               )))
            // ->add('menu_posicion')
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
            ->add('id')
            ->add('imagen_slide')
            ->add('imagen_thumb')
            ->add('menu_posicion')
            ->add('estado')
            ->add('created')
            ->add('updated')
        ;
    }



    public function validate(ErrorElement $errorElement, $object)
    {
        // conditional validation, see the related section for more information

        $errorElement
            ->with('vehiculo_slide')
                ->assertNotNull()
            ->end()
            ->with('categoria_vehiculo')
                ->assertNotNull()
            ->end()
        ;

        if ($object->getImagenSlide() === null ) {
            // nombre cannot be empty when the post is enabled
            $errorElement
                ->with('FileSlide')
                    ->assertNotNull()
                ->end()
            ;
                        
        }
        if ($object->getImagenThumb() === null ) {
            // nombre cannot be empty when the post is enabled
            $errorElement
                ->with('FileThumb')
                    ->assertNotNull()
                ->end()
            ;
                        
        }

        if ($object->getLogo() === null ) {
            // nombre cannot be empty when the post is enabled
            $errorElement
                ->with('FileLogo')
                    ->assertNotNull()
                ->end()
            ;
                        
        }


    }



}
