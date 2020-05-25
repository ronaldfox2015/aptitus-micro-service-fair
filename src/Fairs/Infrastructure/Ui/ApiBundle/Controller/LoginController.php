<?php

namespace Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller;

use Aptitus\Common\Symfony\Response\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class LoginController
 *
 * @package Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller;
 * @author Jospeh Marcilla <jbmarflo@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class LoginController extends Controller
{
    /**
     * @Route("/login")
     * @Method({"POST", "PUT"})
     * @param Request $request
     * @return JsonResponse
     */
    public function indexAction(Request $request)
    {
        $email      = $request->request->get('email', null);
        $password   = $request->request->get('password', null);
        $jwtAuth = $this->get('login.service')->signUp($email, $password);

        if (! $jwtAuth) {
            throw new UnauthorizedHttpException(null, 'Las credenciales son incorrectas.');
        }

        return new JsonResponse([
            'token' => $jwtAuth,
            'message' => 'Se inició sesión correctamente.'
        ]);
    }
}
