<?php

namespace Couture\CoutureBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\View\TwitterBootstrapView;

use Couture\CoutureBundle\Entity\Modele;
use Couture\CoutureBundle\Entity\Image as Image;
use Couture\CoutureBundle\Form\ModeleType;
use Couture\CoutureBundle\Form\ModeleFilterType;

/**
 * Modele controller.
 *
 * @Route("/modele")
 */
class ModeleController extends Controller
{
    /**
     * Lists all Modele entities.
     *
     * @Route("/", name="modele")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();

        list($entities, $pagerHtml) = $this->paginator($queryBuilder);

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
        $filterForm = $this->createForm(new ModeleFilterType());
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('CoutureCoutureBundle:Modele')->createQueryBuilder('e');

        // Reset filter
        if ($request->get('filter_action') == 'reset') {
            $session->remove('ModeleControllerFilter');
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
                $session->set('ModeleControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('ModeleControllerFilter')) {
                $filterData = $session->get('ModeleControllerFilter');
                $filterForm = $this->createForm(new ModeleFilterType(), $filterData);
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
            return $me->generateUrl('modele', array('page' => $page));
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
     * Creates a new Modele entity.
     *
     * @Route("/", name="modele_create")
     * @Method("POST")
     * @Template("CoutureCoutureBundle:Modele:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Modele();
        $form = $this->createForm(new ModeleType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            /*
             * 
             */
            $this->modificationLibelleImage($entity);
            
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('modele_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Modele entity.
     *
     * @Route("/new", name="modele_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Modele();
        $form   = $this->createForm(new ModeleType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Modele entity.
     *
     * @Route("/{id}", name="modele_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        //$image = new Image();
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoutureCoutureBundle:Modele')->find($id);
        

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modele entity.');
        }
        
        $coutures = $entity->getLastCoutures($id, 3, $em);
        
        $idImage = $entity->getImage();
        $image = $em->getRepository('CoutureCoutureBundle:Image')->find($idImage);
        $entity->setImage($image) ;
        
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            'coutures'    => $coutures,
        );
    }

    /**
     * Displays a form to edit an existing Modele entity.
     *
     * @Route("/{id}/edit", name="modele_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoutureCoutureBundle:Modele')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modele entity.');
        }

        $editForm = $this->createForm(new ModeleType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Modele entity.
     *
     * @Route("/{id}", name="modele_update")
     * @Method("PUT")
     * @Template("CoutureCoutureBundle:Modele:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoutureCoutureBundle:Modele')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Modele entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ModeleType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            
            $this->modificationLibelleImage($entity);
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('modele_edit', array('id' => $id)));
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
     * Deletes a Modele entity.
     *
     * @Route("/{id}", name="modele_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CoutureCoutureBundle:Modele')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Modele entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('modele'));
    }

    /**
     * Creates a form to delete a Modele entity by id.
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
    
    /*
     * Pour modifier le libellé des images et mettre les idUser
     */
    private function modificationLibelleImage(Modele $entity)
    {
        /*
        * Si un modèle a été sauvé sans image
        */
       if ($entity->getImage() != null)
       {
           $entity->getImage()->setLibelle($entity->getLibelle());
           $entity->getImage()->setIduser(0);
           $entity->setIduser(0);
       }
    }
}
