<?php

namespace Couture\ClientBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom', 'text', array('label'=>'Prénom'))
            ->add('telephone','text', array('label'=>'Téléphone'))
            ->add('email')
            ->add('adresse')
            //->add('datec')
            //->add('iduser')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Couture\ClientBundle\Entity\Client'
        ));
    }

    public function getName()
    {
        return 'couture_clientbundle_client';
    }
}
