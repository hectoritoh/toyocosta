<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;


use Sonata\AdminBundle\Validator\ErrorElement;


class VehiculoModelosAdmin extends Admin
{
    

    // public  function preUpdate( $obj ){


    //     foreach ($obj->getEspecificaciones() as $especificacion ){

    //         $especificacion->setModelo( $obj );
    //     }

  
    // }



    public function preUpdate( $obj ){


        if ( $obj->getImagenModelo() != null  ) {
            
            $obj->uploadFileModelo();
            
        }

        if ( $obj->getFilePdf() != null  ) {
            
            $obj->uploadFilePdf();

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
            ->add('descripcion')
            ->add('precio')
            ->add('precio_neto')
            ->add('archivo_pdf')
            ->add('imagen_modelo')
            ->add('estado')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('vehiculomodel')
            ->add('nombre')
            ->add('descripcion', null, array('editable' => true))
            ->add('precio')
            ->add('precio_neto')
            ->add('imagen_modelo')
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
        if ($obj && ($webPath =  'uploads/vehiculo/modelo/' . $obj->getImagenModelo())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="admin-preview"/>';
        }

        // $fileFieldOptions2 = array('required' => false);
        // if ($obj && ($webPath =  '/../../../../toyocostaweb/web/'. 'uploads/vehiculo/modelo/pdf' . $obj->getArchivoPdf())) {
        //     // get the container so the full path to the image can be set
        //     $container = $this->getConfigurationPool()->getContainer();
        //     $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

        //     // add a 'help' option containing the preview's img tag
        //     // $fileFieldOptions2['help'] = '<img src="'.$fullPath.'" class="admin-preview" />';
        // }



        $formMapper
            ->add('nombre')
            ->add('descripcion')
            ->add('precio')
            ->add('precio_neto')
            // ->add('filePdf', 'file', $fileFieldOptions2)
            ->add('fileModelo', 'file', $fileFieldOptions)
            // ->with('Especificaciones')
            //     ->add('especificaciones', 'sonata_type_collection', array(
            //      'by_reference' => false,
            //            // Prevents the "Delete" option from being displayed
            //      'type_options' => array('delete' => true)) , array(
            //      'edit' => 'inline',
            //      'inline' => 'standard',
            //      'sortable' => 'position',
            //     ))
            // ->end()
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
            ->add('descripcion')
            ->add('precio')
            ->add('precio_neto')
            ->add('archivo_pdf')
            ->add('imagen_modelo')
            ->add('estado')
            ->add('created')
            ->add('updated')
        ;
    }


      public function validate(ErrorElement $errorElement, $object)
    {
        // conditional validation, see the related section for more information


        if ($object->getImagenModelo() === null ) {
            // nombre cannot be empty when the post is enabled
            $errorElement
                ->with('fileModelo')
                    ->assertNotNull()
                ->end()
            ;
                        
        }

  

    }


}
