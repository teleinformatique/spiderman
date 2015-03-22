<?php

namespace Couture\CoutureBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ModeleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoriemodele','entity', array(
                'class' => 'CoutureCoutureBundle:Categoriemodele',
                'property' => 'libelle',
                'expanded' => false,
                'multiple' => false,
                'label' => 'Catégorie'
                ))
            ->add('libelle','text', array('label'=>'Libellé'))
            ->add('description')
            //->add('datec')
            ->add('genre', 'choice', array(
                        'choices'   => array('0' => 'Femme', '1' => 'Homme'),
                        'required'  => true,))
            //->add('iduser')
            //->add('datemod')
            ->add('image', new ImageType())
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Couture\CoutureBundle\Entity\Modele'
        ));
    }

    public function getName()
    {
        return 'couture_couturebundle_modele';
    }
}
