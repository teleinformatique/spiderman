<?php

namespace Couture\TailleurBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TailleurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('telephone')
            ->add('email')
            ->add('username')
            //->add('password')
            ->add('dateembauche', 'date', array(
                        'label'  => 'Date d\'embauche'))
            ->add('salaire')
            ->add('user', 'choice', array(
                        'choices'   => array('0' => 'Non', '1' => 'Oui'),
                        'required'  => true,))
            //->add('datemod')
            //->add('iduser')
            //->add('datec')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Couture\TailleurBundle\Entity\Tailleur'
        ));
    }

    public function getName()
    {
        return 'couture_tailleurbundle_tailleur';
    }
}
