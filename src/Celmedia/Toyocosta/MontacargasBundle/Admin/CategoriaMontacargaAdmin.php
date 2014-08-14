<?php

namespace Celmedia\Toyocosta\MontacargasBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class CategoriaMontacargaAdmin extends Admin
{
    
    public function preUpdate( $obj ){


        if ( $obj->getFileThumb() != null  ) {
            
            $obj->uploadFileThumb();

        }

        if ( $obj->getFileLogo() != null  ) {
            
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
            ->add('nombre')
            ->add('foto_thumb')
            ->add('logo')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('nombre')
            // ->add('foto_thumb')
            // ->add('logo')
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
        if ($obj && ($webPath = '/../../../../toyocostaweb/web/'. 'uploads/montacargas/categoria/' .    $obj->getFileThumb())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }
        
        $fileFieldOptions2 = array('required' => false);
        if ($obj && ($webPath = '/../../../../toyocostaweb/web/'. 'uploads/montacargas/categoria/' .    $obj->getFileLogo())) {
            
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            
            $fileFieldOptions2['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }



        $formMapper
            ->add('nombre')
            ->add('fileThumb', 'file', $fileFieldOptions )
            ->add('FileLogo', 'file', $fileFieldOptions2 )
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
            ->add('foto_thumb')
            ->add('logo')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
        ;
    }
}
