<?php

namespace Couture\FacturationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\View\TwitterBootstrapView;

use Couture\FacturationBundle\Entity\Facture as Facture;
use Couture\FacturationBundle\Form\FactureType;
use Couture\FacturationBundle\Form\FactureFilterType;
use Couture\CoutureBundle\Entity\Couture as Couture; 

/**
 * Facture controller.
 *
 * @Route("/facture")
 */
class FactureController extends Controller
{
    /**
     * Lists all Facture entities.
     *
     * @Route("/", name="facture")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();

        list($entities, $pagerHtml) = $this->paginator($queryBuilder);
        
//        $idCouture = $entities->getCouture();
//        $couture = $em->getRepository('CoutureCoutureBundle:Couture')->find($idCouture);
//        $entities->setCouture($couture) ;
//        
        return array(
            'entities' => $entities,
            'pagerHtml' => $pagerHtml,
            'filterForm' => $filterForm->createView(),
        );
    }

    /**
    * Create filter form and process filter request.
    *
    */
    protected function filter()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        $em = $this->getDoctrine()->getManager();
        
        $session->remove('FactureControllerFilter');
    
        $filterForm = $this->createForm(new FactureFilterType()/*, new Facture ()*/);
        //$em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('CoutureFacturationBundle:Facture')->createQueryBuilder('e');

        // Reset filter
        if ($request->get('filter_action') == 'reset') {
            $session->remove('FactureControllerFilter');
        }

        // Filter action
        if ($request->get('filter_action') == 'filter') {
            // Bind values from the request
            $filterForm->bind($request);

            if ($filterForm->isValid()) {
                // Build the query from the given form object
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                // Save filter to session
                $filterData = $filterForm->getData();
                $session->set('FactureControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('FactureControllerFilter')) {
                $filterData = $session->get('FactureControllerFilter');
                $filterForm = $this->createForm(new FactureFilterType(), $filterData);
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
            }
        }

        return array($filterForm, $queryBuilder);
    }

    /**
    * Get results from paginator and get paginator view.
    *
    */
    protected function paginator($queryBuilder)
    {
        // Paginator
        $adapter = new DoctrineORMAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);
        $currentPage = $this->getRequest()->get('page', 1);
        $pagerfanta->setCurrentPage($currentPage);
        $entities = $pagerfanta->getCurrentPageResults();

        // Paginator - route generator
        $me = $this;
        $routeGenerator = function($page) use ($me)
        {
            return $me->generateUrl('facture', array('page' => $page));
        };

        // Paginator - view
        $translator = $this->get('translator');
        $view = new TwitterBootstrapView();
        $pagerHtml = $view->render($pagerfanta, $routeGenerator, array(
            'proximity' => 3,
            'prev_message' => $translator->trans('views.index.pagprev', array(), 'JordiLlonchCrudGeneratorBundle'),
            'next_message' => $translator->trans('views.index.pagnext', array(), 'JordiLlonchCrudGeneratorBundle'),
        ));

        return array($entities, $pagerHtml);
    }

    /**
     * Creates a new Facture entity.
     *
     * @Route("/", name="facture_create")
     * @Method("POST")
     * @Template("CoutureFacturationBundle:Facture:new.html.twig")
     */
    public function createAction(Request $request)
    //public function createAction(Couture $couture, $avance)
    {
        
        $entity  = new Facture();
        
        /*if($couture != null)
        {
            $entity->setCouture($couture);
        }*/
        $form = $this->createForm(new FactureType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $etat = $em->getRepository('CoutureFacturationBundle:Etatfacture')->find(1);
            $entity->setEtatfacture($etat);
            $entity->setIduser($this->getUser()->getId());
            $em->persist($entity);
            
            $em->flush();
            
            
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('facture_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Facture entity.
     *
     * @Route("/new", name="facture_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Facture();
        $form   = $this->createForm(new FactureType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Facture entity.
     *
     * @Route("/{id}", name="facture_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoutureFacturationBundle:Facture')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facture entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Facture entity.
     *
     * @Route("/{id}/edit", name="facture_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoutureFacturationBundle:Facture')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facture entity.');
        }

        $editForm = $this->createForm(new FactureType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Facture entity.
     *
     * @Route("/{id}", name="facture_update")
     * @Method("PUT")
     * @Template("CoutureFacturationBundle:Facture:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoutureFacturationBundle:Facture')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Facture entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new FactureType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('facture_edit', array('id' => $id)));
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.update.error');
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Facture entity.
     *
     * @Route("/{id}", name="facture_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CoutureFacturationBundle:Facture')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Facture entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('facture'));
    }

    /**
     * Creates a form to delete a Facture entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
    public function validerAction(Facture $entity, $destination)
    {
        $em = $this->getDoctrine()->getManager();
//
//        $entity = $em->getRepository('CoutureFacturationBundle:Facture')->find($id);
//
//        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find Facture entity.');
//        }

        
        /*
         * il présente des erreurs pour le moment
         */
        $etatFacture = $em->getRepository('CoutureFacturationBundle:Etatfacture')->find(2);
        $entity = $entity->setEtatFacture($etatFacture);

            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

        return $this->redirect($this->generateUrl('facture'));
        
    }
    
    
    public function devaliderAction(Facture $entity, $destination)
    {
        $em = $this->getDoctrine()->getManager();

        $etatFacture = $em->getRepository('CoutureFacturationBundle:Etatfacture')->find(1);
        $entity = $entity->setEtatFacture($etatFacture);

            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

        return $this->redirect($this->generateUrl('facture'));
        
    }
    
    public function reglerAction(Facture $entity, $destination)
    {
        $em = $this->getDoctrine()->getManager();

        
        
        /*
         * il présente des erreurs pour le moment
         */
        $etatFacture = $em->getRepository('CoutureFacturationBundle:Etatfacture')->find(3);
        $entity = $entity->setEtatFacture($etatFacture);

            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');
        return $this->redirect($this->generateUrl("facture"));
    }
    /*
     * Pour générer une facture à partir d'une couture
     * si la couture était déja facturée, la fonction ne marchera pas. 
     */
   public function genererAction($idCouture)
    {
       //$couture = new Couture (); 
       $em = $this->getDoctrine()->getManager();
        $couture = $em->getRepository('CoutureCoutureBundle:Couture')->find($idCouture);
        $facture = $em->getRepository('CoutureFacturationBundle:Facture')->findBy(array('couture' => $couture)) ;
        
        if ($facture) // la facture existe déja ! 
        {
        \Doctrine\Common\Util\Debug::dump($facture);
        die;
        
        }
        else // on crée la facture
        {
            \Doctrine\Common\Util\Debug::dump($couture);
        die;
        }
        /*
         * il présente des erreurs pour le moment
         */
        $etatFacture = $em->getRepository('CoutureFacturationBundle:Etatfacture')->find(3);
        $entity = $entity->setEtatFacture($etatFacture);

            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');
        return $this->redirect($this->generateUrl("facture"));
    }
}
