<?php

namespace Celmedia\Toyocosta\ContenidoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ObsequioAdmin extends Admin
{
    

    public function preUpdate( $obj ){


        if ( $obj->getObsequioImagen() != null  ) {
            
            $obj->uploadObsequioImagen();
            
        }


    }



    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre')
            ->add('imagen')
            ->add('stock')
            ->add('estado')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('establecimiento')
            ->add('nombre')
            ->add('stock')
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

        if ($obj && ($webPath = 'uploads/obsequios/' .    $obj->getImagen())) {
            
            $container = $this->getConfigurationPool()->getContainer();

            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';

            // '<img {% for name, value in options %}{{name}}="{{value}}" {% endfor %} />'
        }


        $formMapper
            ->add('establecimiento')
            ->add('nombre')
            ->add('obsequioImagen', 'file', $fileFieldOptions )
            ->add('stock')
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
            ->add('nombre')
            ->add('imagen')
            ->add('stock')
            ->add('estado')
            ->add('created')
            ->add('updated')
        ;
    }
}
