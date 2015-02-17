<?php

namespace Couture\CoutureBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Couture\CoutureBundle\Form\MesureType as MesureType;

class CoutureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('datec')
            //->add('datemod')
            
            ->add('prix')
            ->add('tissu')
            ->add('detail')
            
            //->add('iduser')
            //->add('etat')
            ->add('datefin')
            ->add('client', 'entity', array(
                                'class' => 'CoutureClientBundle:Client',
                                'property' => 'infosClient',
                                
            ))
            ->add('modele', 'entity', array(
                                'class' => 'CoutureCoutureBundle:Modele',
                                'property' => 'libelle',
            ))
            ->add('mesure', new MesureType())
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
