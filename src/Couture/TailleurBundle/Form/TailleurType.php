<?php

namespace Couture\TailleurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TailleurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('email')
            ->add('login')
            ->add('password')
            ->add('dateembauche')
            ->add('salaire')
            ->add('user')
            ->add('datemod')
            ->add('iduser')
            ->add('datec')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Couture\TailleurBundle\Entity\Tailleur'
        ));
    }

    public function getName()
    {
        return 'couture_tailleurbundle_tailleur';
    }
}
