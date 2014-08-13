<?php

namespace Celmedia\Toyocosta\ContenidoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
// use Symfony\Component\EventDispatcher\Event;
// use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ContenidoAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('titulo')
            ->add('texto')
            ->add('abreviatura')
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
            ->add('titulo')
            ->add('texto')
            ->add('abreviatura')
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
            ->add('titulo')
            //->add('texto')
            // ->add(
            // 'texto',
            // 'ckeditor',
            // array(
            // 'config' => array(
            //     'toolbar' => array(
            //         array(
            //             'name' => 'links',
            //             'items' => array('Link','Unlink'),
            //         ),
            //         array(
            //             'name' => 'insert',
            //             'items' => array('Image'),
            //         ),
            //     )
            // ) ) )
            ->add('texto', 'sonata_formatter_type', array(
                'event_dispatcher' => $formMapper->getFormBuilder()->getEventDispatcher(),
                'format_field'   => 'formato',
                'source_field'   => 'rawText',
                'source_field_options'      => array(
                    'attr' => array('class' => 'span10', 'rows' => 20)
                ),
                'listener'       => true,
                'target_field'   => 'texto'
            ))


            // ->add('shortDescription', 'sonata_formatter_type', array(
            //     'source_field'         => 'texto',
            //     'source_field_options' => array('attr' => array('class' => 'span10', 'rows' => 20)),
            //     'format_field'         => 'descriptionFormatter',
            //     'target_field'         => 'description',
            //     'ckeditor_context'     => 'default',
            //     'event_dispatcher'     => $formMapper->getFormBuilder()->getEventDispatcher()
            // ))
            // ->add('contentFormatter', 'sonata_formatter_type_selector', array(
            //     'source' => 'descripcion_corta',
            //     'target' => 'content'
            // ))
            // ->add('descripcion_corta')
            ->add('abreviatura')
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
            ->add('titulo')
            ->add('texto')
            ->add('abreviatura')
            ->add('estado')
            ->add('created')
            ->add('updated')
        ;
    }
}
