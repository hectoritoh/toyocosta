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
use Symfony\Component\EventDispatcher\EventDispatcherInterface;


class SeminuevoAdmin extends Admin
{
    

    public function preUpdate( $obj ){


        foreach ($obj->getGaleria() as $galeria ){

            $galeria->setSeminuevoGaleria( $obj );
        }


        // foreach ($obj->getCertificados() as $certificado ) {

        //         $certificado->setSeminuevoCertificado( $obj );
        // }

        

    }


    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('modelo')
            ->add('marca')
            ->add('tipo')
            ->add('kilometraje')
            ->add('precio')
            ->add('anio')
            ->add('ubicacion')
            ->add('placa')
            ->add('informacion')
            ->add('descripcion_corta')
            ->add('estado')
            ->add('estado_publicacion')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('modelo')
            ->add('marca')
            ->add('tipo')
            ->add('kilometraje')
            ->add('precio')
            // ->add('anio')
            // ->add('ubicacion')
            // ->add('placa')
            ->add('informacion')
            ->add('descripcion_corta')
            ->add('estado' , 'choice', array('choices' => array(1 => 'Disponible' , 2 => 'Proximammente' , 3 => 'Reservado', 4 => 'Vendido') ) )
            ->add('estado_publicacion' , 'choice', array('choices' => array(1 => 'Aprobado' , 2 => 'Pendiente' , 3 => 'Rechazado') ) )
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
            ->add('marca')
            ->add('tipo')
            ->add('kilometraje')
            ->add('precio')
            ->add('anio')
            ->add('ubicacion')
            ->add('placa')
            ->add('informacion')
            ->add('username', 'hidden', array(
                'data' => 'admin' ))
            ->add('descripcion_corta')
            ->add('estado' , 'choice', array('choices' => array(1 => 'Disponible' , 2 => 'Proximammente' , 3 => 'Reservado', 4 => 'Vendido') ) )
            ->add('estado_publicacion' , 'choice', array('choices' => array(1 => 'Aprobado' , 2 => 'Pendiente' , 3 => 'Rechazado') ) )
            ->add('coloresseminuevo')
            ->add('certificados')
            // ->with('Galeria')
            //     ->add('galeria', 'sonata_type_collection', array(
            //          'by_reference' => false,
            //                // Prevents the "Delete" option from being displayed
            //          'type_options' => array('delete' => false)) , array(
            //          'edit' => 'inline',
            //          'inline' => 'standard',
            //      ))
            // ->end()
            // ->with('Extra')
                ->add('bono')
                ->add('liquidacion')
                ->add('link_ofertar')
            // ->end()
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
            ->setHelps(array(
                    'coloresseminuevo' => 'Color'
                ))
        ;



    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('modelo')
            ->add('marca')
            ->add('tipo')
            ->add('kilometraje')
            ->add('precio')
            ->add('anio')
            ->add('ubicacion')
            ->add('placa')
            ->add('informacion')
            ->add('descripcion_corta')
            ->add('estado' , 'choice', array('choices' => array(1 => 'Disponible' , 2 => 'Proximammente' , 3 => 'Reservado', 4 => 'Vendido') ) )
            ->add('estado_publicacion' , 'choice', array('choices' => array(1 => 'Aprobado' , 2 => 'Pendiente' , 3 => 'Rechazado') ) )

        ;
    }

       public function validate(ErrorElement $errorElement, $object)
    {
        // conditional validation, see the related section for more information

        // $errorElement
        //     ->with('estado')
        //         ->assertNotNull()
        //     ->end()
        //     ->with('estado_publicacion')
        //         ->assertNotNull()
        //     ->end()
        // ;


    }


}
