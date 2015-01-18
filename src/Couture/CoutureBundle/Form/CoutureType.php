<?php

namespace Couture\CoutureBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CoutureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('datec')
            ->add('datemod')
            ->add('datefin')
            ->add('prix')
            ->add('tissu')
            ->add('detail')
            ->add('iduser')
            ->add('etat')
            ->add('client')
            ->add('modele')
            ->add('mesure')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Couture\CoutureBundle\Entity\Couture'
        ));
    }

    public function getName()
    {
        return 'couture_couturebundle_couture';
    }
}
