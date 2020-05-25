<?php

namespace Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller;

use Aptitus\Common\Symfony\Response\JsonResponse;
use Aptitus\Fairs\Application\Fairs\Company\Data\CompanyFilterInput;
use Aptitus\Fairs\Application\Fairs\Company\Data\CompanyInput;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CompanyListController
 *
 * @package Aptitus\Fairs\Infrastructure\Ui\ApiBundle\Controller
 * @author Luis Sánchez <luis.sanchez@orbis.com.pe>
 * @copyright (c) 2017, Orbis
 */
class CompaniesController extends Controller implements TokenController
{
    /**
     * @Route("/fairs/{fairId}/companies", requirements={"fairId" = "\d+"})
     * @Method({"GET"})
     * @param Request $request
     * @return JsonResponse
     */ 
    public function indexAction(Request $request)
    {
        $data = $this->get('fairs.company.query.service')->listAll(
            $request->get('fairId', null),
            new CompanyFilterInput(
                $request->query->get('category', null),
                null,
                $request->query->get('sort', null),
                $request->query->get('order', null)
            ));

        return new JsonResponse($data);
    }

    /**
     * @Route("/fairs/{fairId}/companies", requirements={"fairId" = "\d+"})
     * @Method({"POST"})
     * @param Request $request
     * @param $fairId
     * @return JsonResponse
     */
    public function createAction(Request $request, $fairId)
    {
        $this->get('transaction.company.service')->add(
            new CompanyInput(
                $request->request->get('document_number'),
                $request->request->get('trade_name'),
                $request->request->get('business_name'),
                $request->request->get('slug'),
                $request->request->get('logo'),
                $request->request->get('category'),
                $request->request->get('industry_id'),
                $request->request->get('industry_name'),
                $request->request->get('stand'),
                $request->request->get('profile'),
                $request->request->get('social_media'),
                $request->request->get('image_gallery'),
                $request->request->get('document'),
                $request->request->get('latitude'),
                $request->request->get('longitude'),
                $request->request->get('coords', []),
                $request->request->get('offer_type'),
                $fairId
            )
        );

        return new JsonResponse([
            'message' => 'Se registró la empresa correctamente.'
        ]);
    }

    /**
     * @Route("/fairs/{fairId}/companies/{identifier}", requirements={"fairId": "\d+", "identifier": "[0-9a-z\-,]+"})
     * @Method({"GET"})
     * @param Request $request
     * @param $fairId
     * @param $identifier
     * @return JsonResponse
     */
    public function getAction(Request $request, $fairId, $identifier)
    {
        $result = $this->get('fairs.company.query.service')->getDetail(
            $fairId,
            $identifier,
            new CompanyFilterInput(
                $request->get('category'),
                $request->get('preview', '')
            ));

        return new JsonResponse($result);
    }

    /**
     * @Route("/fairs/{fairId}/companies/{companyId}", requirements={"fairId": "\d+", "companyId": "\d+"})
     * @Method({"PUT"})
     * @param Request $request
     * @param $fairId
     * @param $companyId
     * @return JsonResponse
     */
    public function updateAction(Request $request, $fairId, $companyId)
    {
        $this->get('transaction.company.service')->update(
            new CompanyInput(
                $request->request->get('document_number'),
                $request->request->get('trade_name'),
                $request->request->get('business_name'),
                $request->request->get('slug'),
                $request->request->get('logo'),
                $request->request->get('category'),
                $request->request->get('industry_id'),
                $request->request->get('industry_name'),
                $request->request->get('stand'),
                $request->request->get('profile'),
                $request->request->get('social_media'),
                $request->request->get('image_gallery'),
                $request->request->get('document'),
                $request->request->get('latitude'),
                $request->request->get('longitude'),
                $request->request->get('coords', []),
                $request->request->get('offer_type'),
                $fairId,
                $companyId,
                $request->get('category')
            )
        );

        return new JsonResponse([
            'message' => 'Se actualizó la empresa correctamente.'
        ]);
    }

    /**
     * @Route("/fairs/{fairId}/companies/{companyId}", requirements={"fairId": "\d+", "companyId": "\d+"})
     * @Method({"DELETE"})
     * @param $fairId
     * @param $companyId
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteAction($fairId, $companyId, Request $request)
    {
        $category = $request->request->get('category', null);

        $this->get('transaction.company.service')->removeFromFair($fairId, $companyId, $category);

        return new JsonResponse([
            "message" => "Se eliminó la empresa satisfactoriamente."
        ]);
    }

    /**
     * @Route("/fairs/{fairId}/company-ids", requirements={"fairId": "\d+"})
     * @Method({"GET"})
     * @param Request $request
     * @param $fairId
     * @return JsonResponse
     */
    public function getCompaniesAction(Request $request, $fairId)
    {
        $result = $this->get('fairs.company.query.service')->getAllCompaniesIds(
            $fairId,
            $request->query->get('category', null
            )
        );

        return new JsonResponse($result);
    }
}
