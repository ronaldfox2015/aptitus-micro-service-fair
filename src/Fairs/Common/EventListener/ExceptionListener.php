<?php

namespace Aptitus\Fairs\Common\EventListener;

use Aptitus\Common\Exception\AssertException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class ExceptionListener
 *
 * @package Aptitus\Fairs\Common\EventListener;
 * @author Jospeh Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class ExceptionListener implements EventSubscriberInterface
{
    public function onKernelException(GetResponseForExceptionEvent $event)
    {
        $exception = $event->getException();
        if ($exception instanceof AssertException) {
            $event->setException(new BadRequestHttpException($exception->getMessage(), $exception));
            return;
        }
    }

    /**
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::EXCEPTION => ['onKernelException', 2]
        ];
    }
}
