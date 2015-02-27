<?php

namespace Couture\CoutureBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class CoutureFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('id', 'filter_number_range')
//            ->add('datec', 'filter_date_range')
//            ->add('datemod', 'filter_date_range')
            //->add('datefin', 'filter_date_range')
            //->add('prix', 'filter_number_range')
            //->add('tissu', 'filter_text')
//            ->add('detail', 'filter_text')
//            ->add('iduser', 'filter_number_range')
            ->add('tissu','entity', array(
                            'class' => 'CoutureCoutureBundle:Couture',
                            'property' => 'tissu',
                            'expanded' => false,
                            'multiple' => false,
                            'empty_value' => 'Filtrer par tissu',
                            'required' => false,
                            ))
            ->add('modele','entity', array(
                            'class' => 'CoutureCoutureBundle:Modele',
                            'property' => 'libelle',
                            'expanded' => false,
                            'multiple' => false,
                            'empty_value' => 'Filtrer par modèles',
                            'required' => false,
                ))
            ->add('etat', 'choice', array(
                        'choices'   => array('0' => 'En cours', '1' => 'Terminé'),
                        'empty_value' => 'Choisir par Etat',
                        'required' => false,
                ))
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
        return 'couture_couturebundle_couturefiltertype';
    }
}
