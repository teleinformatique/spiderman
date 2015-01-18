<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // couture_tailleur_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'couture_tailleur_default_index')), array (  '_controller' => 'Couture\\TailleurBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/tailleur')) {
            // tailleur
            if (rtrim($pathinfo, '/') === '/tailleur') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_tailleur;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'tailleur');
                }

                return array (  '_controller' => 'Couture\\TailleurBundle\\Controller\\TailleurController::indexAction',  '_route' => 'tailleur',);
            }
            not_tailleur:

            // tailleur_create
            if ($pathinfo === '/tailleur/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_tailleur_create;
                }

                return array (  '_controller' => 'Couture\\TailleurBundle\\Controller\\TailleurController::createAction',  '_route' => 'tailleur_create',);
            }
            not_tailleur_create:

            // tailleur_new
            if ($pathinfo === '/tailleur/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_tailleur_new;
                }

                return array (  '_controller' => 'Couture\\TailleurBundle\\Controller\\TailleurController::newAction',  '_route' => 'tailleur_new',);
            }
            not_tailleur_new:

            // tailleur_show
            if (preg_match('#^/tailleur/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_tailleur_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tailleur_show')), array (  '_controller' => 'Couture\\TailleurBundle\\Controller\\TailleurController::showAction',));
            }
            not_tailleur_show:

            // tailleur_edit
            if (preg_match('#^/tailleur/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_tailleur_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tailleur_edit')), array (  '_controller' => 'Couture\\TailleurBundle\\Controller\\TailleurController::editAction',));
            }
            not_tailleur_edit:

            // tailleur_update
            if (preg_match('#^/tailleur/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_tailleur_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tailleur_update')), array (  '_controller' => 'Couture\\TailleurBundle\\Controller\\TailleurController::updateAction',));
            }
            not_tailleur_update:

            // tailleur_delete
            if (preg_match('#^/tailleur/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_tailleur_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tailleur_delete')), array (  '_controller' => 'Couture\\TailleurBundle\\Controller\\TailleurController::deleteAction',));
            }
            not_tailleur_delete:

        }

        // couture_facturation_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'couture_facturation_default_index')), array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/etatFacture')) {
            // etatFacture
            if (rtrim($pathinfo, '/') === '/etatFacture') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_etatFacture;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'etatFacture');
                }

                return array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\EtatfactureController::indexAction',  '_route' => 'etatFacture',);
            }
            not_etatFacture:

            // etatFacture_create
            if ($pathinfo === '/etatFacture/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_etatFacture_create;
                }

                return array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\EtatfactureController::createAction',  '_route' => 'etatFacture_create',);
            }
            not_etatFacture_create:

            // etatFacture_new
            if ($pathinfo === '/etatFacture/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_etatFacture_new;
                }

                return array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\EtatfactureController::newAction',  '_route' => 'etatFacture_new',);
            }
            not_etatFacture_new:

            // etatFacture_show
            if (preg_match('#^/etatFacture/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_etatFacture_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'etatFacture_show')), array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\EtatfactureController::showAction',));
            }
            not_etatFacture_show:

            // etatFacture_edit
            if (preg_match('#^/etatFacture/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_etatFacture_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'etatFacture_edit')), array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\EtatfactureController::editAction',));
            }
            not_etatFacture_edit:

            // etatFacture_update
            if (preg_match('#^/etatFacture/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_etatFacture_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'etatFacture_update')), array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\EtatfactureController::updateAction',));
            }
            not_etatFacture_update:

            // etatFacture_delete
            if (preg_match('#^/etatFacture/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_etatFacture_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'etatFacture_delete')), array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\EtatfactureController::deleteAction',));
            }
            not_etatFacture_delete:

        }

        if (0 === strpos($pathinfo, '/facture')) {
            // facture
            if (rtrim($pathinfo, '/') === '/facture') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_facture;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'facture');
                }

                return array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\FactureController::indexAction',  '_route' => 'facture',);
            }
            not_facture:

            // facture_create
            if ($pathinfo === '/facture/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_facture_create;
                }

                return array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\FactureController::createAction',  '_route' => 'facture_create',);
            }
            not_facture_create:

            // facture_new
            if ($pathinfo === '/facture/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_facture_new;
                }

                return array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\FactureController::newAction',  '_route' => 'facture_new',);
            }
            not_facture_new:

            // facture_show
            if (preg_match('#^/facture/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_facture_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'facture_show')), array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\FactureController::showAction',));
            }
            not_facture_show:

            // facture_edit
            if (preg_match('#^/facture/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_facture_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'facture_edit')), array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\FactureController::editAction',));
            }
            not_facture_edit:

            // facture_update
            if (preg_match('#^/facture/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_facture_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'facture_update')), array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\FactureController::updateAction',));
            }
            not_facture_update:

            // facture_delete
            if (preg_match('#^/facture/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_facture_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'facture_delete')), array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\FactureController::deleteAction',));
            }
            not_facture_delete:

        }

        if (0 === strpos($pathinfo, '/couture')) {
            // couture
            if (rtrim($pathinfo, '/') === '/couture') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_couture;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'couture');
                }

                return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\CoutureController::indexAction',  '_route' => 'couture',);
            }
            not_couture:

            // couture_create
            if ($pathinfo === '/couture/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_couture_create;
                }

                return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\CoutureController::createAction',  '_route' => 'couture_create',);
            }
            not_couture_create:

            // couture_new
            if ($pathinfo === '/couture/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_couture_new;
                }

                return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\CoutureController::newAction',  '_route' => 'couture_new',);
            }
            not_couture_new:

            // couture_show
            if (preg_match('#^/couture/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_couture_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'couture_show')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\CoutureController::showAction',));
            }
            not_couture_show:

            // couture_edit
            if (preg_match('#^/couture/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_couture_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'couture_edit')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\CoutureController::editAction',));
            }
            not_couture_edit:

            // couture_update
            if (preg_match('#^/couture/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_couture_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'couture_update')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\CoutureController::updateAction',));
            }
            not_couture_update:

            // couture_delete
            if (preg_match('#^/couture/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_couture_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'couture_delete')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\CoutureController::deleteAction',));
            }
            not_couture_delete:

        }

        // couture_couture_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'couture_couture_default_index')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/etatIntervention')) {
            // etatIntervention
            if (rtrim($pathinfo, '/') === '/etatIntervention') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_etatIntervention;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'etatIntervention');
                }

                return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\EtatinterventionController::indexAction',  '_route' => 'etatIntervention',);
            }
            not_etatIntervention:

            // etatIntervention_create
            if ($pathinfo === '/etatIntervention/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_etatIntervention_create;
                }

                return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\EtatinterventionController::createAction',  '_route' => 'etatIntervention_create',);
            }
            not_etatIntervention_create:

            // etatIntervention_new
            if ($pathinfo === '/etatIntervention/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_etatIntervention_new;
                }

                return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\EtatinterventionController::newAction',  '_route' => 'etatIntervention_new',);
            }
            not_etatIntervention_new:

            // etatIntervention_show
            if (preg_match('#^/etatIntervention/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_etatIntervention_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'etatIntervention_show')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\EtatinterventionController::showAction',));
            }
            not_etatIntervention_show:

            // etatIntervention_edit
            if (preg_match('#^/etatIntervention/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_etatIntervention_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'etatIntervention_edit')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\EtatinterventionController::editAction',));
            }
            not_etatIntervention_edit:

            // etatIntervention_update
            if (preg_match('#^/etatIntervention/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_etatIntervention_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'etatIntervention_update')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\EtatinterventionController::updateAction',));
            }
            not_etatIntervention_update:

            // etatIntervention_delete
            if (preg_match('#^/etatIntervention/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_etatIntervention_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'etatIntervention_delete')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\EtatinterventionController::deleteAction',));
            }
            not_etatIntervention_delete:

        }

        if (0 === strpos($pathinfo, '/image')) {
            // image
            if (rtrim($pathinfo, '/') === '/image') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_image;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'image');
                }

                return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ImageController::indexAction',  '_route' => 'image',);
            }
            not_image:

            // image_create
            if ($pathinfo === '/image/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_image_create;
                }

                return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ImageController::createAction',  '_route' => 'image_create',);
            }
            not_image_create:

            // image_new
            if ($pathinfo === '/image/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_image_new;
                }

                return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ImageController::newAction',  '_route' => 'image_new',);
            }
            not_image_new:

            // image_show
            if (preg_match('#^/image/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_image_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'image_show')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ImageController::showAction',));
            }
            not_image_show:

            // image_edit
            if (preg_match('#^/image/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_image_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'image_edit')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ImageController::editAction',));
            }
            not_image_edit:

            // image_update
            if (preg_match('#^/image/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_image_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'image_update')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ImageController::updateAction',));
            }
            not_image_update:

            // image_delete
            if (preg_match('#^/image/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_image_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'image_delete')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ImageController::deleteAction',));
            }
            not_image_delete:

        }

        if (0 === strpos($pathinfo, '/m')) {
            if (0 === strpos($pathinfo, '/mesure')) {
                // mesure
                if (rtrim($pathinfo, '/') === '/mesure') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_mesure;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'mesure');
                    }

                    return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\MesureController::indexAction',  '_route' => 'mesure',);
                }
                not_mesure:

                // mesure_create
                if ($pathinfo === '/mesure/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_mesure_create;
                    }

                    return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\MesureController::createAction',  '_route' => 'mesure_create',);
                }
                not_mesure_create:

                // mesure_new
                if ($pathinfo === '/mesure/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_mesure_new;
                    }

                    return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\MesureController::newAction',  '_route' => 'mesure_new',);
                }
                not_mesure_new:

                // mesure_show
                if (preg_match('#^/mesure/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_mesure_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'mesure_show')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\MesureController::showAction',));
                }
                not_mesure_show:

                // mesure_edit
                if (preg_match('#^/mesure/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_mesure_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'mesure_edit')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\MesureController::editAction',));
                }
                not_mesure_edit:

                // mesure_update
                if (preg_match('#^/mesure/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_mesure_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'mesure_update')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\MesureController::updateAction',));
                }
                not_mesure_update:

                // mesure_delete
                if (preg_match('#^/mesure/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_mesure_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'mesure_delete')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\MesureController::deleteAction',));
                }
                not_mesure_delete:

            }

            if (0 === strpos($pathinfo, '/modele')) {
                // modele
                if (rtrim($pathinfo, '/') === '/modele') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_modele;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'modele');
                    }

                    return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ModeleController::indexAction',  '_route' => 'modele',);
                }
                not_modele:

                // modele_create
                if ($pathinfo === '/modele/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_modele_create;
                    }

                    return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ModeleController::createAction',  '_route' => 'modele_create',);
                }
                not_modele_create:

                // modele_new
                if ($pathinfo === '/modele/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_modele_new;
                    }

                    return array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ModeleController::newAction',  '_route' => 'modele_new',);
                }
                not_modele_new:

                // modele_show
                if (preg_match('#^/modele/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_modele_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'modele_show')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ModeleController::showAction',));
                }
                not_modele_show:

                // modele_edit
                if (preg_match('#^/modele/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_modele_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'modele_edit')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ModeleController::editAction',));
                }
                not_modele_edit:

                // modele_update
                if (preg_match('#^/modele/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_modele_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'modele_update')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ModeleController::updateAction',));
                }
                not_modele_update:

                // modele_delete
                if (preg_match('#^/modele/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_modele_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'modele_delete')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\ModeleController::deleteAction',));
                }
                not_modele_delete:

            }

        }

        if (0 === strpos($pathinfo, '/client')) {
            // client
            if (rtrim($pathinfo, '/') === '/client') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_client;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'client');
                }

                return array (  '_controller' => 'Couture\\ClientBundle\\Controller\\ClientController::indexAction',  '_route' => 'client',);
            }
            not_client:

            // client_create
            if ($pathinfo === '/client/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_client_create;
                }

                return array (  '_controller' => 'Couture\\ClientBundle\\Controller\\ClientController::createAction',  '_route' => 'client_create',);
            }
            not_client_create:

            // client_new
            if ($pathinfo === '/client/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_client_new;
                }

                return array (  '_controller' => 'Couture\\ClientBundle\\Controller\\ClientController::newAction',  '_route' => 'client_new',);
            }
            not_client_new:

            // client_show
            if (preg_match('#^/client/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_client_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_show')), array (  '_controller' => 'Couture\\ClientBundle\\Controller\\ClientController::showAction',));
            }
            not_client_show:

            // client_edit
            if (preg_match('#^/client/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_client_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_edit')), array (  '_controller' => 'Couture\\ClientBundle\\Controller\\ClientController::editAction',));
            }
            not_client_edit:

            // client_update
            if (preg_match('#^/client/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_client_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_update')), array (  '_controller' => 'Couture\\ClientBundle\\Controller\\ClientController::updateAction',));
            }
            not_client_update:

            // client_delete
            if (preg_match('#^/client/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_client_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'client_delete')), array (  '_controller' => 'Couture\\ClientBundle\\Controller\\ClientController::deleteAction',));
            }
            not_client_delete:

        }

        // couture_client_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'couture_client_default_index')), array (  '_controller' => 'Couture\\ClientBundle\\Controller\\DefaultController::indexAction',));
        }

        // homepage
        if ($pathinfo === '/app/example') {
            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/demo')) {
            if (0 === strpos($pathinfo, '/demo/secured')) {
                if (0 === strpos($pathinfo, '/demo/secured/log')) {
                    if (0 === strpos($pathinfo, '/demo/secured/login')) {
                        // _demo_login
                        if ($pathinfo === '/demo/secured/login') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                        }

                        // _demo_security_check
                        if ($pathinfo === '/demo/secured/login_check') {
                            return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_demo_security_check',);
                        }

                    }

                    // _demo_logout
                    if ($pathinfo === '/demo/secured/logout') {
                        return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                    }

                }

                if (0 === strpos($pathinfo, '/demo/secured/hello')) {
                    // acme_demo_secured_hello
                    if ($pathinfo === '/demo/secured/hello') {
                        return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                    }

                    // _demo_secured_hello
                    if (preg_match('#^/demo/secured/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',));
                    }

                    // _demo_secured_hello_admin
                    if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_secured_hello_admin')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',));
                    }

                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_demo_hello')), array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
