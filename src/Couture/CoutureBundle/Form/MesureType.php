<?php

namespace Couture\CoutureBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MesureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cou')
            ->add('poitrine')
            ->add('taille')
            ->add('ceinture')
            ->add('longchemise')
            ->add('longpantalon')
            ->add('longrobe')
            ->add('manche')
            ->add('hanche')
            ->add('epaule')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Couture\CoutureBundle\Entity\Mesure'
        ));
    }

    public function getName()
    {
        return 'couture_couturebundle_mesure';
    }
}
