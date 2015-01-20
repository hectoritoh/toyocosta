<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

use Sonata\AdminBundle\Validator\ErrorElement;

class VehiculoColoresAdmin extends Admin
{
    

    public function preUpdate( $obj ){


        if ( $obj->getImagenColor() != null  ) {
            
            $obj->uploadImagenVehiculo();
            
        }


    }


    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('imagen_color')
            ->add('estado')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('vehiculo')
            ->add('imagen_color')
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


        if ($obj && ($webPath = 'uploads/vehiculo/color/' .    $obj->getImagenColor())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview" />';
        }

        $formMapper
            ->add('coloresvehiculo')
            ->add('ImagenVehiculo', 'file' , $fileFieldOptions)
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
            ->add('imagen_color')
            ->add('estado')
        ;
    }


    public function validate(ErrorElement $errorElement, $object)
    {
        // conditional validation, see the related section for more information

        if ($object->getImagenColor() === null ) {
            // nombre cannot be empty when the post is enabled
            $errorElement
                ->with('ImagenVehiculo')
                    ->assertNotNull()
                ->end()
            ;
                        
        }

  

    }



}
