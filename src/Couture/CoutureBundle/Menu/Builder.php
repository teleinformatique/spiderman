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
        
        $menu->addChild('Modèle', array('route' => 'modele'));
        $menu['Modèle']->addChild('Ajouter', array('route' => 'modele_new'));
        $menu['Modèle']->addChild('Lister', array('route' => 'modele'));
        
        $menu->addChild('Couture', array('route' => 'couture'));
        
        $menu['Couture']->addChild('Ajouter', array('route' => 'couture_new'));
        $menu['Couture']->addChild('Lister', array('route' => 'couture'));
        
        /*$menu->addChild('Ajouter', array(
            'route' => 'add',
            'routeParameters' => array('id' => 42)
        ));*/
        // ... add more children

        return $menu;
    }
}
