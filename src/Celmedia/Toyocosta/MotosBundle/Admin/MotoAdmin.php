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

class MotoAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */




    public function preUpdate( $obj ){

        foreach ($obj->getColores() as $color ) {

            $color->setMoto( $obj );
        }

                
        if ( $obj->getImagenBanner() != null  ) {
            
            $obj->uploadFileBanner();
            
        }

        if ( $obj->getFileFicha() != null  ) {
            
            $obj->uploadFileFicha();

        }

    }


    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('nombre')
            ->add('precio')
            ->add('informacion')
            ->add('imagen_banner')
            ->add('ficha')
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
            ->add('categoria')
            ->add('id')
            ->add('nombre')
            ->add('precio')
            ->add('informacion')
            ->add('imagen_banner')
            ->add('ficha')
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
        if ($obj && ($webPath = 'uploads/motos/banner/' .    $obj->getImagenBanner())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }


        $fileFieldOptions3 = array('required' => false);
        if ($obj && ($webPath = 'uploads/motos/ficha/' .    $obj->getFicha())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions3['help'] = '<a href="'.$fullPath.'" target="_blank"> Ficha Tecnica </a>';
        }



        $formMapper
            ->add('categoria')
            ->add('nombre')
            ->add('precio')
            ->add('informacion')
            ->add('fileBanner', 'file', $fileFieldOptions )
            ->add('fileFicha', 'file', $fileFieldOptions3 )
            ->add('colores', 'sonata_type_collection', array(
                     'by_reference' => false,
                           // Prevents the "Delete" option from being displayed
                     'type_options' => array('delete' => false)) , array(
                     'edit' => 'inline',
                     'inline' => 'standard',
                 ))
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
            ->add('informacion')
            ->add('imagen_banner')
            ->add('ficha')
            ->add('estado')
            ->add('created')
            ->add('updated')
        ;
    }


        public function validate(ErrorElement $errorElement, $object)
    {
        // conditional validation, see the related section for more information

        $errorElement
            ->with('categoria')
                ->assertNotNull()
            ->end()
        ;

        if ($object->getImagenBanner() === null ) {
            // nombre cannot be empty when the post is enabled
            $errorElement
                ->with('fileBanner')
                    ->assertNotNull()
                ->end()
            ;
                        
        }
        

    }



}
