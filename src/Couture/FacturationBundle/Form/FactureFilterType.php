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
//            ->add('couture','entity', array(
//                'class' => 'CoutureCoutureBundle:Couture',
//                'property' => 'infosCouture',
//                'expanded' => false,
//                'multiple' => false,
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
