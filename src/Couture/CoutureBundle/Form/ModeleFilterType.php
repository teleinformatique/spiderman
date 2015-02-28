<?php

namespace Couture\CoutureBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class ModeleFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('id', 'filter_number_range')
            //->add('libelle', 'filter_text')
            ->add('categoriemodele','entity', array(
                            'class' => 'CoutureCoutureBundle:Categoriemodele',
                            'property' => 'libelle',
                            'expanded' => false,
                            'multiple' => false,
                            'empty_value' => 'Choisir une catégorie',
                            'required' => false,
                            ))
            ->add('genre', 'choice', array(
                            'choices'   => array(1 => 'Femme', 2 => 'Homme'),
                            'empty_value' => 'Filtrer par genre',
                            'required' => false,
                ))
//            ->add('description', 'filter_text')
//            ->add('datec', 'filter_date_range')
//            ->add('iduser', 'filter_number_range')
//            ->add('datemod', 'filter_date_range')
        ;

        $listener = function(FormEvent $event)
        {
            // Is data empty?
            foreach ($event->getData() as $data) {
                if(is_array($data)) {
                    foreach ($data as $subData) {
                        if(!empty($subData)) return;
                    }
                }
                else {
                    if(!empty($data)) return;
                }
            }

            $event->getForm()->addError(new FormError('Filter empty'));
        };
        $builder->addEventListener(FormEvents::POST_BIND, $listener);
    }

    public function getName()
    {
        return 'couture_couturebundle_modelefiltertype';
    }
}
