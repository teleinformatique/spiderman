<?php

namespace Couture\FacturationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class FactureFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('id', 'filter_number_range')
            ->add('date', 'filter_date_range')
//            ->add('datemod', 'filter_date_range')
//            ->add('datec', 'filter_date_range')
//            ->add('iduser', 'filter_number_range')
//            ->add('avance', 'filter_number_range')
            ->add('etatfacture','entity', array(
                'class' => 'CoutureFacturationBundle:Etatfacture',
                'property' => 'libelle',
                'expanded' => false,
                'multiple' => false,
                'placeholder' => 'Filtrer par Etat',
                'required' => false,
                
                ))
//            ->add('etatfacture', 'choice', array(
//                            'choices'   => array(1 => 'Initial', 2 => 'Validé', 3 => 'Réglé'),
//                            'empty_value' => 'Choisir par Etat',
//                            'required' => false,
//                ))
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
        return 'couture_facturationbundle_facturefiltertype';
    }
}
