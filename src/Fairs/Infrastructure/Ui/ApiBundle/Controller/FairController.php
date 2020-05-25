<?php

namespace Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller;

use Aptitus\Common\Symfony\Response\JsonResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

/**
 * Class FairController
 *
 * @package Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller
 * @author Alfredo Espiritu <alfredo.espiritu.m@gmail.com>
 * @copyright (c) 2018, Orbis
 */
class FairController extends Controller
{
    /**
     * @Route(
     *     "/fairs/{fairId}/feed/{page}",
     *     requirements={
     *       "page": "(facebook)"
     *     }
     * )
     * @Method({"POST"})
     * @param $fairId
     * @param $page
     * @return JsonResponse
     */
    public function feedAction($fairId, $page)
    {
        $upload = $this->get('fairs.feed.service')->generate($fairId);

        return new JsonResponse([
            'link' => $upload['link'],
            'message' => sprintf('Se generó el feed %s correctamente.', $page)
        ]);
    }

    /**
     * @Route(
     *     "/fairs/{fairId}/feed/{page}",
     *     requirements={
     *       "page": "(expogrados)"
     *     }
     * )
     * @Method({"POST"})
     * @param $fairId
     * @param $page
     * @return JsonResponse
     */
    public function feedExpogradosAction($fairId, $page)
    {
        $upload = $this->get('fairs.education.feed.service')->generate($fairId);

        return new JsonResponse([
            'link' => $upload['link'],
            'message' => sprintf('Se generó el feed %s correctamente.', $page)
        ]);
    }
}
