<?php

namespace Couture\FacturationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class FactureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date')
            ->add('quantite')
            //->add('datemod')
            //->add('datec')
            //->add('iduser')
            ->add('avance')
            ->add('couture','entity', array(
                'class' => 'CoutureCoutureBundle:Couture',
                'property' => 'infosCouture',
//                'allow_add' => true,
//                'by_reference' => false,
            ))
            /*->add('etatfacture','entity', array(
                'class' => 'CoutureFacturationBundle:Etatfacture',
                'property' => 'libelle',
                'expanded' => false,
                'multiple' => false,
            ))*/
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Couture\FacturationBundle\Entity\Facture'
        ));
    }

    public function getName()
    {
        return 'couture_facturationbundle_facture';
    }
}
