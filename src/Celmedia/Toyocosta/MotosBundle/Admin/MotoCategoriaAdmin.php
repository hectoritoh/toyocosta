<?php

namespace Celmedia\Toyocosta\MotosBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sonata\AdminBundle\Validator\ErrorElement;


class MotoCategoriaAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */




    public function preUpdate( $obj ){


        if ( $obj->getImagenThumb() != null  ) {
            
            $obj->uploadFileThumb();

        }


        if ( $obj->getLogoHome() != null  ) {
            
            $obj->uploadFileLogo();

        }


        if ( $obj->getLogoHover() != null  ) {
            
            $obj->uploadFileHover();

        }



    }



    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('nombre')
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
            ->add('nombre')
            ->add('descripcion')
            ->add('imagen_thumb')
            ->add('logo_home')
            ->add('logo_hover')
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
        $fileFieldOptions2 = array('required' => false);
        if ($obj && ($webPath = 'uploads/motos/thumb/' .    $obj->getImagenThumb())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions2['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }

        $fileFieldOptions3 = array('required' => false);
        if ($obj && ($webPath = 'uploads/motos/thumb/' .    $obj->getLogoHome())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions3['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }

        $fileFieldOptions4 = array('required' => false);
        if ($obj && ($webPath = 'uploads/motos/thumb/' .    $obj->getLogoHover())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions4['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }




        $formMapper
            ->add('nombre')
            ->add('fileThumb' , 'file' , $fileFieldOptions2)
            ->add('fileLogo' , 'file' , $fileFieldOptions3)
            ->add('fileHover' , 'file' , $fileFieldOptions4)
            ->add('descripcion')
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
            ->add('imagen_thumb')
            ->add('estado')
            ->add('created')
            ->add('updated')
        ;
    }
}
