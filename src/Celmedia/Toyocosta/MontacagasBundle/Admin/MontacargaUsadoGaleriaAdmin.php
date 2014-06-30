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


class MontacargaUsadoGaleriaAdmin extends Admin
{
    


    public function preUpdate( $obj ){


        if ( $obj->getFoto() != null  ) {
            
            $obj->uploadFileFoto();
            
        }



    }


    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('foto')
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
            ->add('montacarga_usado')
            ->add('foto')
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
        if ($obj && ($webPath = '/../../../../toyocostaweb/web/'. 'uploads/montacargas/usados/' .    $obj->getFoto())) {
            
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }




        $formMapper
            ->add('FileFoto', 'file', $fileFieldOptions)
            ->add('estado' , 'choice', array('choices' => array(1 => 'Publicado' , 0 => 'No publicado') ) )
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('foto')
            ->add('estado' , 'choice', array('choices' => array(1 => 'Publicado' , 0 => 'No publicado') ) )
        ;
    }


    public function validate(ErrorElement $errorElement, $object)
    {

        if ($object->getFoto() === null ) {
            
            $errorElement
                ->with('FileFoto')
                    ->assertNotNull()
                ->end()
            ;
                        
        }
  

    }

}
