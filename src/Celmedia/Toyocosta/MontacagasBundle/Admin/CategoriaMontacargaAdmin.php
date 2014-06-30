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


class CategoriaMontacargaAdmin extends Admin
{
    

    public function preUpdate( $obj ){


        if ( $obj->getFotoThumb() != null  ) {
            
            $obj->uploadFileThumb();
            
        }

        if ( $obj->getLogo() != null  ) {
            
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
        if ($obj && ($webPath = '/../../../../toyocostaweb/web/'. 'uploads/montacargas/categoria/' .    $obj->getFotoThumb())) {
            
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }


        $fileFieldOptions2 = array('required' => false);
        if ($obj && ($webPath = '/../../../../toyocostaweb/web/'. 'uploads/montacargas/categoria/' .    $obj->getLogo())) {

            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            $fileFieldOptions2['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }






        $formMapper
            ->add('nombre')
            ->add('fileThumb', 'file', $fileFieldOptions)
            ->add('FileLogo', 'file', $fileFieldOptions2 )
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
            ->add('nombre')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
        ;
    }


    public function validate(ErrorElement $errorElement, $object)
    {
        // conditional validation, see the related section for more information

        if ($object->getFotoThumb() === null ) {
            // nombre cannot be empty when the post is enabled
            $errorElement
                ->with('fileThumb')
                    ->assertNotNull()
                ->end()
            ;
                        
        }
        if ($object->getLogo() === null ) {
            // nombre cannot be empty when the post is enabled
            $errorElement
                ->with('FileLogo')
                    ->assertNotNull()
                ->end()
            ;
                        
        }

  

    }


}
