<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class VehiculoAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
        ->add('id')
        ->add('nombre')
        ->add('precio')
        ->add('precio_neto')
        ->add('descripcion')
        ->add('imagen_banner')
        ->add('imagen_thumb')
        ->add('estado')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->add('id')
        ->add('nombre')
        ->add('categoria')
        ->add('precio')
        ->add('precio_neto')
        ->add('descripcion')
        ->add('imagen_banner')
        ->add('imagen_thumb')
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
        if ($obj && ($webPath = '/../../../../toyocosta/web/'. 'uploads/vehiculo/banner/' .    $obj->getImagenBanner())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview" />';
        }
        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions2 = array('required' => false);
        if ($obj && ($webPath = '/../../../../toyocosta/web/'. 'uploads/vehiculo/thumb/' .    $obj->getImagenThumb())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions2['help'] = '<img src="'.$fullPath.'" class="admin-preview" />';
        }


        $formMapper
        ->add('nombre')
        ->add('categoria')
        ->add('precio')
        ->add('precio_neto')
        ->add('colores', 'sonata_type_collection', array(
             'by_reference' => false,
                   // Prevents the "Delete" option from being displayed
             'type_options' => array('delete' => true)) , array(
             'edit' => 'inline',
             'inline' => 'table',
             'sortable' => 'position',
         ))
        ->add('galeria', 'sonata_type_collection', array(
             'by_reference' => false,
                   // Prevents the "Delete" option from being displayed
             'type_options' => array('delete' => true)) , array(
             'edit' => 'inline',
             'inline' => 'table',
             'sortable' => 'position',
         ))
        ->add('descripcion')
        ->add('fileThumb' , 'file' , $fileFieldOptions2)
        ->add('fileBanner', 'file', $fileFieldOptions )
        ->add('estado', 'choice', array(
           'choices' => array(
               '1' => 'Publicado',
               '0' => 'No publicado'
               )));
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
        ->add('id')
        ->add('nombre')
        ->add('precio')
        ->add('precio_neto')
        ->add('descripcion')
        ->add('imagen_banner')
        ->add('imagen_thumb')
        ->add('estado')
        ;
    }
}
