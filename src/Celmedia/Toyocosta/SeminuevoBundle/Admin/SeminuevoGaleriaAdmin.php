<?php

namespace Celmedia\Toyocosta\SeminuevoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sonata\AdminBundle\Validator\ErrorElement;

class SeminuevoGaleriaAdmin extends Admin
{
    

    public function preUpdate( $obj ){


        if ( $obj->getFileImagen() != null  ) {
            
            $obj->uploadFileImagen();
            
        }


    }


    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('imagen')
            ->add('estado')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('seminuevo_galeria')
            ->add('imagen')
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
        
        $obj = $this->getSubject();

        $fileFieldOptions = array('required' => false);
        if ($obj && ($webPath = '/../../../../toyocostaweb/web/'. 'uploads/seminuevos/' .    $obj->getImagen())) {
            
            $container = $this->getConfigurationPool()->getContainer();

            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';

            // '<img {% for name, value in options %}{{name}}="{{value}}" {% endfor %} />'
        }


        $formMapper
            ->add('fileImagen', 'file', $fileFieldOptions )
            ->add('estado' , 'choice', array('choices' => array(1 => 'Publicado' , 0 => 'No publicado') ) )
        ;

    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('imagen')
            ->add('estado')
        ;
    }
}
