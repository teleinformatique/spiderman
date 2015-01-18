<?php

namespace Couture\CoutureBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class MesureFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('id', 'filter_number_range')
            ->add('cou', 'filter_number_range')
            ->add('poitrine', 'filter_number_range')
            ->add('taille', 'filter_number_range')
            ->add('ceinture', 'filter_number_range')
            ->add('longchemise', 'filter_number_range')
            ->add('longpantalon', 'filter_number_range')
            ->add('longrobe', 'filter_number_range')
            ->add('manche', 'filter_number_range')
            ->add('hanche', 'filter_number_range')
            ->add('epaule', 'filter_number_range')
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
        return 'couture_couturebundle_mesurefiltertype';
    }
}
