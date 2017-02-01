<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevDebugProjectContainerUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevDebugProjectContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        // _hello_symfony_version
        if (0 === strpos($pathinfo, '/hello/symfony') && preg_match('#^/hello/symfony/(?P<version>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => '_hello_symfony_version')), array (  '_controller' => 'kernel:helloSymfony',));
        }

        // tic_tic_random
        if (0 === strpos($pathinfo, '/random') && preg_match('#^/random/(?P<limit>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'tic_tic_random')), array (  '_controller' => 'TicBundle\\Controller\\TicController::randomAction',));
        }

        // tic_tic_board
        if ($pathinfo === '/tictactoe') {
            return array (  '_controller' => 'TicBundle\\Controller\\TicController::boardAction',  '_route' => 'tic_tic_board',);
        }

        // tic_tic_makemove
        if ($pathinfo === '/api/makeMove') {
            return array (  '_controller' => 'TicBundle\\Controller\\TicController::makeMoveAction',  '_route' => 'tic_tic_makemove',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
