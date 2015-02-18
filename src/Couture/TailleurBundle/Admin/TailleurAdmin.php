<?php
namespace Couture\TailleurBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Couture\TailleurBundle\Form\TailleurType;
//use Couture\TailleurBundle\Entity\UploadedFileTransformer;

class TailleurAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
         
        $formMapper
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('email')
            ->add('login')
            ->add('password')
            ->add('dateembauche', 'date', array(
                        'label'  => 'Date d\'embauche'))
            ->add('salaire')
            ->add('user', 'choice', array(
                        'choices'   => array('0' => 'Non', '1' => 'Oui'),
                        'required'  => true,))
            //->add('datemod')
            //->add('iduser')
            //->add('datec')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('email')
            ->add('login')
        ;
    }
    
   

}
