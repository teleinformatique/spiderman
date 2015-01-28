<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// src/Acme/DemoBundle/Menu/Builder.php
namespace Couture\ClientBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        
        $menu->setChildrenAttributes(array('class' => 'nav navbar-nav'));
        //$menu->setChildrenAttribute('class', 'nav pull-right');
        
        $menu->addChild('Accueil', array('route' => 'client'))
                ->setLinkAttribute('class', 'navbar-brand')
                /*->setAttribute('class', 'navbar-brand')*/;

        $menu->addChild('Client', array('route' => 'client'), 'class', 'dropdown-toggle')
                ->setLinkAttribute('class', 'dropdown-toggle')
                //->setChildrenAttributes(array('class' => 'nav navbar-nav'))
                ////->setAttribute('class', 'dropdown-toggle')
                //->setAttribute('aria-expanded', 'false')
//                ->setAttribute('role', 'button')
//                ->setAttribute('dropdown', true)
//                ->setAttribute('icon', 'icon-user')
                ;
        
        $menu['Client']->addChild('Ajouter', array('route' => 'client_new'))
                        ->setAttribute('icon', 'icon-edit');
        $menu['Client']->addChild('Lister', array('route' => 'client'))
                        ->setAttribute('icon', 'icon-edit');
        
        $menu->addChild('Modèle', array('route' => 'modele'));
        $menu['Modèle']->addChild('Ajouter', array('route' => 'modele_new'));
        $menu['Modèle']->addChild('Lister', array('route' => 'modele'));
        
        $menu->addChild('Couture', array('route' => 'couture'));
        
        $menu['Couture']->addChild('Ajouter', array('route' => 'couture_new'));
        $menu['Couture']->addChild('Lister', array('route' => 'couture'));
        
        $menu->addChild('Facturation', array('route' => 'facture'));
        
        $menu['Facturation']->addChild('Ajouter', array('route' => 'facture_new'));
        $menu['Facturation']->addChild('Lister', array('route' => 'facture'));
        
        $menu->addChild('Tailleur', array('route' => 'tailleur'));
        
        $menu['Tailleur']->addChild('Ajouter', array('route' => 'tailleur_new'));
        $menu['Tailleur']->addChild('Lister', array('route' => 'tailleur'));
        
        /*$menu->addChild('Ajouter', array(
            'route' => 'add',
            'routeParameters' => array('id' => 42)
        ));*/
        // ... add more children

        return $menu;
    }
}
