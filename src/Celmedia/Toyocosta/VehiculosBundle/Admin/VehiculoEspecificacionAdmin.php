<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class VehiculoEspecificacionAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('seccion')
            ->add('contenido')
            ->add('formato')
            ->add('rawText')
            ->add('estado')
            ->add('created')
            ->add('updated')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('seccion')
            ->add('vehiculo_especificacion')
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
        $formMapper
            ->add('seccion', 'choice', array(
               'choices' => array(
                   'mecanica' => 'Mecanica',
                   'exterior' => 'Exterior',
                   'interior' => 'Interior',
                   'seguridad' => 'Seguridad'
                   )))
            // ->add('contenido')
            ->add('contenido', 'sonata_formatter_type', array(
                'event_dispatcher' => $formMapper->getFormBuilder()->getEventDispatcher(),
                'format_field'   => 'formato',
                'source_field'   => 'rawText',
                'source_field_options'      => array(
                    'attr' => array('class' => 'span10', 'rows' => 20)
                ),
                'listener'       => true,
                'target_field'   => 'contenido'
            ))
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
            ->add('seccion')
            ->add('contenido')
            ->add('formato')
            ->add('rawText')
            ->add('estado')
            ->add('created')
            ->add('updated')
        ;
    }
}
