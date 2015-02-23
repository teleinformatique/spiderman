<?php

namespace Couture\VitrineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Couture\CoutureBundle\Entity\Modele;
use Couture\CoutureBundle\Entity\Image as Image;
use Couture\CoutureBundle\Form\ModeleType;

class VitrineController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoutureCoutureBundle:Modele')->findAll();
        

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modele entity.');
        }
        
        
        return $this->render('CoutureVitrineBundle:Vitrine:index.html.twig', array(
                "entity" => $entity
            ));    }

    public function licenceAction()
    {
        return $this->render('CoutureVitrineBundle:Vitrine:licence.html.twig', array(
                // ...
            ));    }

    public function aproposAction()
    {
        return $this->render('CoutureVitrineBundle:Vitrine:apropos.html.twig', array(
                // ...
            ));    }

}
