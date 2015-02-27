<?php

namespace Couture\TailleurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormError;

class TailleurFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('id', 'filter_number_range')
            //->add('nom', 'filter_text')
            //->add('prenom', 'filter_text')
            ->add('telephone', 'filter_text')
//            ->add('email', 'filter_text')
//            ->add('login', 'filter_text')
//            ->add('password', 'filter_text')
//            ->add('dateembauche', 'filter_date_range')
//            ->add('salaire', 'filter_number_range')
//            ->add('user', 'filter_number_range')
//            ->add('datemod', 'filter_date_range')
//            ->add('iduser', 'filter_number_range')
//            ->add('datec', 'filter_date_range')
                ->add('nom','entity', array(
                'class' => 'CoutureTailleurBundle:Tailleur',
                'property' => 'nom',
                'expanded' => false,
                'multiple' => false,
                'empty_value' => 'Filtrer par nom de famille',
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
        return 'couture_tailleurbundle_tailleurfiltertype';
    }
}
