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
use Doctrine\Common\Util\Debug as Debug;

use Couture\CoutureBundle\Entity\Couture as Couture;
use Couture\CoutureBundle\Form\CoutureType;
use Couture\CoutureBundle\Form\CoutureFilterType;
use Couture\CoutureBundle\Entity\Mesure as Mesure ;

/**
 * Couture controller.
 *
 * @Route("/couture")
 */
class CoutureController extends Controller
{
    /**
     * Lists all Couture entities.
     *
     * @Route("/", name="couture")
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
        $filterForm = $this->createForm(new CoutureFilterType());
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('CoutureCoutureBundle:Couture')->createQueryBuilder('e');

        // Reset filter
        if ($request->get('filter_action') == 'reset') {
            $session->remove('CoutureControllerFilter');
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
                $session->set('CoutureControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('CoutureControllerFilter')) {
                $filterData = $session->get('CoutureControllerFilter');
                $filterForm = $this->createForm(new CoutureFilterType(), $filterData);
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
            return $me->generateUrl('couture', array('page' => $page));
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
     * Creates a new Couture entity.
     *
     * @Route("/", name="couture_create")
     * @Method("POST")
     * @Template("CoutureCoutureBundle:Couture:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Couture();
        $form = $this->createForm(new CoutureType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $entity->setIduser($this->getUser()->getId());
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('couture_show', array('id' => $entity->getId())));
            
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Couture entity.
     *
     * @Route("/new", name="couture_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Couture();
        $form   = $this->createForm(new CoutureType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Couture entity.
     *
     * @Route("/{id}", name="couture_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoutureCoutureBundle:Couture')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Couture entity.');
        }
        
        

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
            
        );
    }

    /**
     * Displays a form to edit an existing Couture entity.
     *
     * @Route("/{id}/edit", name="couture_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoutureCoutureBundle:Couture')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Couture entity.');
        }

        $editForm = $this->createForm(new CoutureType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Couture entity.
     *
     * @Route("/{id}", name="couture_update")
     * @Method("PUT")
     * @Template("CoutureCoutureBundle:Couture:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CoutureCoutureBundle:Couture')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Couture entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CoutureType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('couture_edit', array('id' => $id)));
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
     * Deletes a Couture entity.
     *
     * @Route("/{id}", name="couture_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CoutureCoutureBundle:Couture')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Couture entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('couture'));
    }

    /**
     * Creates a form to delete a Couture entity by id.
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
     * Clôturer une couture, c'est à dire la mettre à l'état terminé.
     */
    public function cloturerAction(Couture $entity, $destination)
    {
        $em = $this->getDoctrine()->getManager();
        $entity->setEtat(1);

            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');
        return $this->redirect($this->generateUrl("couture"));
    }
    
}
