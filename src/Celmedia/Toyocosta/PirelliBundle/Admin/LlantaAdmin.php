<?php 

namespace Celmedia\Toyocosta\PirelliBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class LlantaAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {


     $obj = $this->getSubject();

        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions = array('required' => false);
        if ($obj && ($webPath = __DIR__.'../../../../../../../../../../../../toyocosta/web/'. 'uploads/pirelli/' .    $obj->getImagen())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }

        // use $fileFieldOptions so we can add other options to the field
        $fileFieldOptions2 = array('required' => false);
        if ($obj && ($webPath = __DIR__.'../../../../../../../../../../../../toyocosta/web/'. 'uploads/pirelli/fichas' .    $obj->getFicha())) {
            // get the container so the full path to the image can be set
            $container = $this->getConfigurationPool()->getContainer();
            $fullPath = $container->get('request')->getBasePath().'/'.$webPath;

            // add a 'help' option containing the preview's img tag
            $fileFieldOptions2['help'] = '<img src="'.$fullPath.'" class="img-responsive" />';
        }


        $formMapper
            ->add('modelo')
            ->add('file', 'file',  $fileFieldOptions)
            ->add('medida')
            ->add('rin')
             ->add('segmento', 'choice', array(
           'choices' => array(
               'Automovil' => 'Automovil',
               'Camioneta' => 'Camioneta',
               'Suv' => 'Suv',
               'Industrial' => 'Industrial',
               'Camion' => 'Camion'
               )))
            ->add('precio')
            ->add('fileFicha', 'file', $fileFieldOptions2)
            ->add('estado' , 'choice', array('choices' => array(1 => 'Publicado' , 0 => 'No publicado') ) ) //if no type is specified, SonataAdminBundle tries to guess it

        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('modelo')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('modelo')
            ->add('segmento')
            ->add('medida')

        ;
    }


       public function preUpdate($obj)
    {
        $obj->upload();
    }
    
       public function prePersist($obj)
    {

        $obj->upload();
    }

}


?>