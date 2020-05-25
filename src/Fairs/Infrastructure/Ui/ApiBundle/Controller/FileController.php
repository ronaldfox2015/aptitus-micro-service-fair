<?php

namespace Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller;

use Aptitus\Common\Symfony\Response\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class FileController
 *
 * @package Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller
 * @author Joseph Marcilla <jbmarflo@gmail.com>
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class FileController extends Controller implements TokenController
{
    /**
     * @Route("/upload-file/{type}", name="upload-file")
     * @Method("POST")
     * @param Request $request
     * @param string $type
     * @return JsonResponse
     */
    public function indexAction(Request $request, string $type)
    {
        $file = $request->files->get('file', null);
        $folder = $request->get('folder', null);

        if (is_null($file)) {
            throw new BadRequestHttpException('El archivo es requerido.');
        }

        if (is_null($folder)) {
            throw new BadRequestHttpException('El folder es requerido.');
        }

        $fileSrv = $this->get('file.service')->save($file, $type, $folder);
        $fileSrv['message'] = 'Archivo subido correctamente.';

        return new JsonResponse($fileSrv);
    }
}
