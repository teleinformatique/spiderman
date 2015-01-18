<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // couture_tailleur_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'couture_tailleur_default_index')), array (  '_controller' => 'Couture\\TailleurBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/tailleur_')) {
            // tailleur_
            if (rtrim($pathinfo, '/') === '/tailleur_') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_tailleur_;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'tailleur_');
                }

                return array (  '_controller' => 'Couture\\TailleurBundle\\Controller\\TailleurController::indexAction',  '_route' => 'tailleur_',);
            }
            not_tailleur_:

            // tailleur__show
            if (preg_match('#^/tailleur_/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_tailleur__show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'tailleur__show')), array (  '_controller' => 'Couture\\TailleurBundle\\Controller\\TailleurController::showAction',));
            }
            not_tailleur__show:

        }

        if (0 === strpos($pathinfo, '/hello')) {
            // couture_facturation_default_index
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'couture_facturation_default_index')), array (  '_controller' => 'Couture\\FacturationBundle\\Controller\\DefaultController::indexAction',));
            }

            // couture_couture_default_index
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'couture_couture_default_index')), array (  '_controller' => 'Couture\\CoutureBundle\\Controller\\DefaultController::indexAction',));
            }

        }

        if (0 === strpos($pathinfo, '/client_')) {
            // client_
            if (rtrim($pathinfo, '/') === '/client_') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_client_;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'client_');
                }

                return array (  '_controller' => 'Couture\\ClientBundle\\Controller\\ClientController::indexAction',  '_route' => 'client_',);
            }
            not_client_:

            // client__show
            if (preg_match('#^/client_/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_client__show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'client__show')), array (  '_controller' => 'Couture\\ClientBundle\\Controller\\ClientController::showAction',));
            }
            not_client__show:

        }

        // couture_client_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'couture_client_default_index')), array (  '_controller' => 'Couture\\ClientBundle\\Controller\\DefaultController::indexAction',));
        }

        // homepage
        if ($pathinfo === '/app/example') {
            return array (  '_controller' => 'AppBundle\\Controller\\DefaultController::indexAction',  '_route' => 'homepage',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
