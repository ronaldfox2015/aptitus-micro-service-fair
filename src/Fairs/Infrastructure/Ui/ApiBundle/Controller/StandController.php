<?php

namespace Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class StandController
 *
 * @author Paul Taboada <pacharly89@gmail.com>
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @package Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller
 * @copyright (c) 2017, Orbis
 */
class StandController extends Controller implements TokenController
{
    /**
     * @Route("/stand-types/{standTypeId}", requirements={"standTypeId" = "\d+"}))
     * @param $standTypeId
     * @return JsonResponse
     */
    public function typeAction($standTypeId)
    {
        $dataRules = $this->get('stand_type.service')->getDataDependenceRules($standTypeId);

        return new JsonResponse([
            'message' => 'Depedencias y reglas listadas correctamente.',
            'data' => $dataRules
        ]);
    }

    /**
     * @Route("/stand-amphitryons/{amphitryonId}", requirements={"amphitryonId" = "\d+"}))
     * @param $amphitryonId
     * @return JsonResponse
     */
    public function amphitryonAction($amphitryonId)
    {
        return new JsonResponse([
            'message' => 'Se obtuvo la información del anfitrión correctamente.',
            'data' => ['image' => $this->getParameter('amphitryons')["amphitryon$amphitryonId"]]
        ]);
    }

    /**
     * @Route("/stand-models/{modelId}", requirements={"modelId" = "\d+"}))
     * @param $modelId
     * @return JsonResponse
     */
    public function modelAction($modelId)
    {
        $modelData = $this->getParameter('models')["model$modelId"];

        return new JsonResponse([
            'message' => 'Se obtuvo la información del modelo de stand correctamente.',
            'data' => $modelData
        ]);
    }
}
