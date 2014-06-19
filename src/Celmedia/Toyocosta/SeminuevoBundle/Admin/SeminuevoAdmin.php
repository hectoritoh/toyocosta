<?php

namespace Celmedia\Toyocosta\SeminuevoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class SeminuevoAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('modelo')
            ->add('marca')
            ->add('tipo')
            ->add('kilometraje')
            ->add('precio')
            ->add('anio')
            ->add('ubicacion')
            ->add('placa')
            ->add('informacion')
            ->add('descripcion_corta')
            ->add('estado')
            ->add('estado_publicacion')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('modelo')
            ->add('marca')
            ->add('tipo')
            ->add('kilometraje')
            ->add('precio')
            // ->add('anio')
            // ->add('ubicacion')
            // ->add('placa')
            ->add('informacion')
            ->add('descripcion_corta')
            ->add('estado' , 'choice', array('choices' => array(1 => 'Disponible' , 2 => 'Proximammente' , 3 => 'Reservado', 4 => 'Vendido') ) )
            ->add('estado_publicacion' , 'choice', array('choices' => array(1 => 'Aprobado' , 2 => 'Pendiente' , 3 => 'Rechazado') ) )
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
        $formMapper
            ->add('modelo')
            ->add('marca')
            ->add('tipo')
            ->add('kilometraje')
            ->add('precio')
            ->add('anio')
            ->add('ubicacion')
            ->add('placa')
            ->add('informacion')
            ->add('descripcion_corta')
            ->add('estado' , 'choice', array('choices' => array(1 => 'Disponible' , 2 => 'Proximammente' , 3 => 'Reservado', 4 => 'Vendido') ) )
            ->add('estado_publicacion' , 'choice', array('choices' => array(1 => 'Aprobado' , 2 => 'Pendiente' , 3 => 'Rechazado') ) )
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('modelo')
            ->add('marca')
            ->add('tipo')
            ->add('kilometraje')
            ->add('precio')
            ->add('anio')
            ->add('ubicacion')
            ->add('placa')
            ->add('informacion')
            ->add('descripcion_corta')
            ->add('estado' , 'choice', array('choices' => array(1 => 'Disponible' , 2 => 'Proximammente' , 3 => 'Reservado', 4 => 'Vendido') ) )
            ->add('estado_publicacion' , 'choice', array('choices' => array(1 => 'Aprobado' , 2 => 'Pendiente' , 3 => 'Rechazado') ) )
        ;
    }

       public function validate(ErrorElement $errorElement, $object)
    {
        // conditional validation, see the related section for more information

        // $errorElement
        //     ->with('estado')
        //         ->assertNotNull()
        //     ->end()
        //     ->with('estado_publicacion')
        //         ->assertNotNull()
        //     ->end()
        // ;


    }


}
