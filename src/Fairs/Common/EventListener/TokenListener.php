<?php

namespace Aptitus\Fairs\Common\EventListener;

use Aptitus\Fairs\Infrastructure\Services\Encrypt\Jwt;
use Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller\TokenController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;

/**
 * Class TokenListener
 *
 * @package Aptitus\Fairs\Common\EventListener
 * @author Joseph Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class TokenListener
{
    private $jwt;

    public function __construct(Jwt $jwt)
    {
        $this->jwt = $jwt;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        if (! is_array($controller)) {
            return;
        }

        /*if ($controller[0] instanceof TokenController) {
            $token = Request::createFromGlobals()->headers->get('token');
            $auth = $this->jwt->decode($token);

            $event->getRequest()->attributes->set('auth', $auth);
        }*/
    }
}
