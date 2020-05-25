<?php

namespace Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller;

use Aptitus\Fairs\Application\Fairs\Sponsor\Data\SponsorInput;
use Aptitus\Fairs\Domain\Model\Customers\Category;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Assert\AssertionFailedException;

/**
 * Class SponsorsController
 *
 * @package Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller
 * @author Jairo Rojas <jairo.rojas@metricaandina.com>
 * @copyright (c) 2018, Orbis
 */
class SponsorsController extends Controller
{
    /**
     * @Route("/{fairId}/sponsors", name="get-all-sponsor")
     * @Method({"GET"})
     * @param Request $request
     * @param $fairId
     * @return JsonResponse
     */
    public function indexAction(Request $request, $fairId)
    {
        $data = $this->get('sponsor.management.service')->listSponsorsByFair(
            $request->query->get('category', null),
            $fairId);
        return new JsonResponse($data);
    }

    /**
     * @Route("/{fairId}/sponsors", name="add-sponsor")
     * @Method({"POST"})
     * @param Request $request
     * @param $fairId
     * @return JsonResponse
     * @throws AssertionFailedException
     */
    public function createAction(Request $request, $fairId)
    {
        $this->get('sponsor.management.service')->add(
            new SponsorInput(
                $request->request->get('companyName'),
                $request->request->get('image'),
                $request->request->get('url'),
                $request->request->get('coords', []),
                $request->request->get('category')
            ), $fairId
        );

        return new JsonResponse([
            'message' => 'Se registró el patrocinador correctamente.'
        ]);
    }

    /**
     * @Route("/{fairId}/sponsor/{sponsorFairId}", requirements={"sponsorFairId": "\d+"})
     * @Method({"PUT"})
     * @param Request $request
     * @param $sponsorFairId
     * @param $fairId
     * @return JsonResponse
     * @throws AssertionFailedException
     */
    public function updateAction(Request $request, $fairId, $sponsorFairId)
    {
        $this->get('sponsor.management.service')->put(new SponsorInput(
            $request->request->get('companyName'),
            $request->request->get('image'),
            $request->request->get('url'),
            $request->request->get('coords'),
            $request->request->get('category')
        ), $sponsorFairId);

        return new JsonResponse([
            "message" => "Se actualizó al patrocinador satisfactoriamente."
        ]);
    }

    /**
     * @Route("/{fairId}/sponsor/{sponsorFairId}", requirements={"sponsorFairId": "\d+"})
     * @Method({"DELETE"})
     * @param $sponsorFairId
     * @param $fairId
     * @return JsonResponse
     */
    public function deleteAction($sponsorFairId, $fairId)
    {
        $this->get('sponsor.management.service')->delete($fairId, $sponsorFairId);

        return new JsonResponse([
            "message" => "Se eliminó al patrocinador satisfactoriamente."
        ]);
    }

    /**
     * @Route("/{fairId}/sponsor/{sponsorFairId}", requirements={"sponsorFairId": "\d+"})
     * @Method({"GET"})
     * @param $sponsorFairId
     * @param $fairId
     * @return JsonResponse
     */
    public function getAction($sponsorFairId, $fairId)
    {
        $data = $this->get('sponsor.management.service')->get($fairId, $sponsorFairId);

        return new JsonResponse($data);
    }
}