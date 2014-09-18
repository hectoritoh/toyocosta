<?php

namespace Celmedia\Toyocosta\VehiculosBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sonata\AdminBundle\Validator\ErrorElement;



class VehiculoAdmin extends Admin
{

    // protected $datagridValues = array(
    //     '_page' => 1,            // display the first page (default = 1)
    //     '_sort_order' => 'DESC', // reverse order (default = 'ASC')
    //     '_sort_by' => 'updated'  // name of the ordered field
    //                              // (default = the model's id field, if any)

    //     // the '_sort_by' key can be of the form 'mySubModel.mySubSubModel.myField'.
    // );

    public function preUpdate( $obj ){

        
        foreach ($obj->getEspecificaciones() as $modelo ) {

                $modelo->setVehiculoEspecificacion( $obj );
        }


        foreach ($obj->getGaleria() as $galeria ){

            $galeria->setVehiculogaleria( $obj );
        }


        foreach ($obj->getColores() as $color ) {

                $color->setVehiculo( $obj );
        }

        foreach ($obj->getModelos() as $modelo ) {

                $modelo->setVehiculomodel( $obj );
        }
        
        if ( $obj->getImagenBanner() != null  ) {
            
            $obj->uploadFileBanner();
            
        }

        if ( $obj->getImagenThumb() != null  ) {
            
            $obj->uploadFileThumb();

        }

        if ( $obj->getFileFicha() != null  ) {
            
            $obj->uploadFileFicha();

        }

    }

    
    //    public function prePersist($obj)
    // {

    //     if ( ($obj->getImagenBanner()) != null  ) {
    //         $banner= 'banner';
    //         $obj->upload($banner);
    //     }

    //     if ( ($obj->getImagenThumb()) != null  ) {
    //         $thumb ='thumb';
    //         $obj->upload($thumb);
    //     }
    // }


    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('nombre')
            ->add('precio')
            ->add('precio_neto')
            ->add('informacion')
            ->add('descripcion')
            ->add('estado')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('categoria')
            ->add('nombre', null, array('editable' => true))
            ->add('precio')
            ->add('precio_neto')
            ->add('informacion', null, array('editable' => true))
            ->add('descripcion', null, array('editable' => true))
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

        //  if($this->hasParentFieldDescription()) { // this Admin is embedded
        //     // $getter will be something like 'getlogoImage'
        //     $getter = 'get' . $this->getParentFieldDescription()->getFieldName();

        //     // get hold of the parent object
        //     $parent = $this->getParentFieldDescription()->getAdmin()->getSubject();
        //     if ($parent) {
        //         $obj = $parent->$getter();
        //     } else {
        //         $obj = null;
        //     }
        // } else {
        //     $obj = $this->getSubject();
        // }






        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions = array('required' => false);
        if ($obj && ($webPath = 'uploads/vehiculo/banner/' .    $obj->getImagenBanner())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }
        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions2 = array('required' => false);
        if ($obj && ($webPath = 'uploads/vehiculo/thumb/' .    $obj->getImagenThumb())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions2['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }

        $fileFieldOptions3 = array('required' => false);
        if ($obj && ($webPath = 'uploads/vehiculo/ficha/' .    $obj->getFicha())) {
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
            ->add('precio_neto')
            ->add('informacion')
            ->add('descripcion')
            ->add('fileThumb' , 'file' , $fileFieldOptions2)
            ->add('fileBanner', 'file', $fileFieldOptions )
            ->add('fileFicha', 'file', $fileFieldOptions3 )
            ->add('plazos')
            // GALERIA CON MEDIA BUNDLE ENTITY GALLERY
            ->add('imagenes', 'sonata_type_collection', array(
                'cascade_validation' => true,
                ), array(
                'edit' => 'inline',
                'inline' => 'table',
                'sortable' => 'position',
                'link_parameters' => array('context' => 'default'),
                'admin_code' => 'sonata.media.admin.gallery_has_media'
                )
            )
            // ->with('Galeria')
            //     ->add('galeria', 'sonata_type_collection', array(
            //          'by_reference' => false,
            //                // Prevents the "Delete" option from being displayed
            //          'type_options' => array('delete' => false)) , array(
            //          'edit' => 'inline',
            //          'inline' => 'standard',
            //      ))
            // ->end()
            ->add('colores', 'sonata_type_collection', array(
                 'by_reference' => false,
                       // Prevents the "Delete" option from being displayed
                 'type_options' => array('delete' => false)) , array(
                 'edit' => 'inline',
                 'inline' => 'standard',
             ))
            ->add('modelos', 'sonata_type_collection', array(
                 'by_reference' => false,
                 'type_options' => array('delete' => false)) , array(
                 'edit' => 'inline',
                 'inline' => 'standard',
             ))
            ->add('especificaciones', 'sonata_type_collection', array(
                     'by_reference' => false,
                     'type_options' => array('delete' => false)) , array(
                     'edit' => 'inline',
                     'inline' => 'standard',
                 ))           
            ->setHelps(array(
                    'precio' => 'Precio sin IVA',
                    'precio_neto' => 'Precio con Iva',
                    'colores' => 'Galeria de Vehiculos con Diferentes Colores',
                    'galeria' => 'Galeria de Vehiculos: Videos / Imagenes',
                    'modelos' => 'Modelos de Vehiculos',
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
            ->add('precio_neto')
            ->add('informacion')
            ->add('descripcion')
            ->add('imagen_banner')
            ->add('imagen_thumb')
            ->add('estado')
            ->with('Videos y Fotos')
                ->add('galeria')
            ->end()
            ->with('Colores de Vehiculo')
                ->add('colores')
            ->end()
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
        if ($object->getImagenThumb() === null ) {
            // nombre cannot be empty when the post is enabled
            $errorElement
                ->with('fileThumb')
                    ->assertNotNull()
                ->end()
            ;
                        
        }



    }


}
