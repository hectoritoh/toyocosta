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


class MontacargaAdmin extends Admin
{
    

    public function preUpdate( $obj ){


        if ( $obj->getFicha() != null  ) {
            
            $obj->uploadFilePdf();
            
        }

        foreach ($obj->getGaleria() as $galeria ){

            $galeria->setMontacargaGaleria( $obj );
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
            ->add('caracteristicas')
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
            ->add('montacarga_subcategoria')
            ->add('modelo')
            ->add('precio')
            ->add('caracteristicas')
            ->add('ficha')
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
        if ($obj && ($webPath = '/../../../../toyocostaweb/web/'. 'uploads/montacargas/ficha/' .    $obj->getFicha())) {
            
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

        }


        $formMapper
            ->add('montacarga_subcategoria')
            ->add('modelo')
            ->add('precio')
            ->add('caracteristicas')
            ->add('filePdf', 'file', $fileFieldOptions )
            ->with('Galeria')
                ->add('galeria', 'sonata_type_collection', array(
                     'by_reference' => false,
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
            ->add('caracteristicas')
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
            ->with('montacarga_subcategoria')
                ->assertNotNull()
            ->end()
        ;

        if ($object->getFicha() === null ) {
            // nombre cannot be empty when the post is enabled
            $errorElement
                ->with('filePdf')
                    ->assertNotNull()
                ->end()
            ;
                        
        }
  

    }


}
