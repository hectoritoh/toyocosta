<?php

namespace Celmedia\Toyocosta\MontacagasBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sonata\AdminBundle\Validator\ErrorElement;


class MontacargaUsadoAdmin extends Admin
{
    


    public function preUpdate( $obj ){


        foreach ($obj->getGaleria() as $galeria ){

            $galeria->setMontacargaUsado( $obj );
        }


    }





    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('modelo')
            ->add('precio')
            ->add('anio')
            ->add('descripcion')
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
            ->add('modelo')
            ->add('precio')
            ->add('anio')
            ->add('descripcion')
            ->add('estado' , 'choice', array('choices' => array(1 => 'Publicado' , 0 => 'No publicado') ) )
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
            ->add('precio')
            ->add('anio')
            ->add('descripcion')
            ->with('Galeria')
                ->add('galeria', 'sonata_type_collection', array(
                     'by_reference' => false,
                           // Prevents the "Delete" option from being displayed
                     'type_options' => array('delete' => false)) , array(
                     'edit' => 'inline',
                     'inline' => 'standard',
                 ))
            ->end()
            ->add('estado' , 'choice', array('choices' => array(1 => 'Publicado' , 0 => 'No publicado') ) )
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('modelo')
            ->add('precio')
            ->add('anio')
            ->add('descripcion')
            ->add('estado')
            ->add('created')
            ->add('updated')
        ;
    }
}
