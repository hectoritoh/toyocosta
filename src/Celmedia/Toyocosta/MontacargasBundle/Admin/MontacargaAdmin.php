<?php

namespace Celmedia\Toyocosta\MontacargasBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MontacargaAdmin extends Admin
{
    
    public function preUpdate( $obj ){


        if ( $obj->getFicha() != null  ) {
            
            $obj->uploadFilePdf();

        }

    }


    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('montacarga_subcategoria')
            ->add('modelo')
            ->add('precio')
            ->add('estado')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('montacarga_subcategoria')
            ->add('modelo')
            ->add('precio')
            // ->add('caracteristicas')
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

        $fileFieldOptions3 = array('required' => false);
        if ($obj && ($webPath = 'uploads/montacargas/ficha/' .    $obj->getFicha())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions3['help'] = '<a href="'.$fullPath.'" target="_blank"> Ficha Tecnica </a>';
        }


        $formMapper
            ->add('montacarga_subcategoria')
            ->add('modelo')
            ->add('precio')
            // ->add('caracteristicas')
            ->add('caracteristicas', 'sonata_formatter_type', array(
                'event_dispatcher' => $formMapper->getFormBuilder()->getEventDispatcher(),
                'format_field'   => 'formato',
                'source_field'   => 'rawText',
                'source_field_options'      => array(
                    'attr' => array('class' => 'span10', 'rows' => 20)
                ),
                'listener'       => true,
                'target_field'   => 'caracteristicas'
            ))
            // ->add('ficha')
            ->add('filePdf', 'file', $fileFieldOptions3 )
            // ->add('file', 'sonata_media_type', array(
            //   'provider' => 'sonata.media.provider.image',
            //   'context'  => 'montacarga'
            //   ))
            ->add('estado', 'choice', array(
           'choices' => array(
               '1' => 'Publicado',
               '0' => 'No publicado'
               )))
            ->add('imagenes', 'sonata_type_collection', array(
                'cascade_validation' => true,
                ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
                'link_parameters' => array('context' => 'montacarga'),
                'admin_code' => 'sonata.media.admin.gallery_has_media'
                )
            )


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
            ->add('caracteristicas')
            ->add('ficha')
            ->add('estado')
            ->add('created')
            ->add('updated')
        ;
    }
}
