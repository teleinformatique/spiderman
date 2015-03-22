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
            ->add('cou','number', array('label' => 'Cou'))
            ->add('poitrine','number', array('label' => 'Tour Poitrine'))
            ->add('taille','number', array('label' => 'Taille'))
            ->add('ceinture','number', array('label' => 'Ceinture'))
            ->add('longchemise','number', array('label' => 'Longueur Chemise'))
            ->add('longpantalon','number', array('label' => 'Longueur Pantalon'))
            ->add('longrobe','number', array('label' => 'Longueur Robe'))
            ->add('manche','number', array('label' => 'Manche'))
            ->add('hanche','number', array('label' => 'Hanche'))
            ->add('epaule','number', array('label' => 'Epaule'))
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
