<?php

namespace Aptitus\IntegrationTests\Fairs;

use Aptitus\Fairs\Domain\Model\Fairs\CompanyFair;
use Aptitus\Fairs\Domain\Model\Fairs\StandTypeRule;
use Aptitus\IntegrationTests\Common\AptTestIntegration;

/**
 * Class CompanieUpdateControllerTest
 *
 * @package Aptitus\IntegrationTests\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class CompanyMngUpdateControllerTest extends AptTestIntegration
{
    const FAIR_EXPOAPTITUS_ID = 1;
    const COMPANY_APTITUS_ID = 1;

    //companies
    private function getUrl()
    {
        return sprintf('/%s/fair', self::API_VERSION);
    }

    private static function getParams()
    {
        return [
            'document_number' => '20520603892',
            'trade_name' => 'ATENTO DEL PERU',
            'business_name' => 'TELEATENTO DEL PERU S.A.C',
            'slug' => 'atento-peru',
            'logo' => 'RTIUR546RT546REEyutsdds42DQA.jpg',
            'category' => 'Empleo',
            'industry_id' => 90,
            'industry_name' => 'Salud',
            'stand' => [
                'type_id' => 1,
                'model_id' => 4,
                'amphitryon' => 3,
                'colors' => [
                    'color_1' => '#2abf2a',
                    'color_2' => '#0027ea'
                ],
                'images' => [
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_monitor'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_totem'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_banderole_1'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_banderole_2'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_top'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_counter'
                    ]
                ],
                'video' => 'https://www.youtube.com/watch?v=5o_nExedezw'
            ],
            'profile' => [
                [
                    'title' => 'Misión',
                    'description' => 'Misión de nuestra empresa en llevar a cabo...'
                ],
                [
                    'title' => 'Nuestros Productos',
                    'description' => 'Nuestros productos respetan los estándares más altos de calidad ISO 9000...'
                ]
            ],
            'social_media' => [
                [
                    'link' => 'https://www.facebook.com/zuck',
                    'name' => 'Facebook'
                ],
                [
                    'link' => 'https://www.youtube.com/watch?v=5o_nExedezw',
                    'name' => 'Youtube'
                ]
            ],
            'image_gallery' => [
                [
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png'
                ],
                [
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png'
                ]
            ],
            'document' => [
                [
                    'title' => 'Brochure 2017',
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.docx'
                ],
                [
                    'title' => 'Perfil Institucional',
                    'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.xls'
                ]
            ]
        ];
    }

    private function getUrlUpdateCompanyFair($fairId = self::FAIR_EXPOAPTITUS_ID, $companyId = self::COMPANY_APTITUS_ID)
    {
        return sprintf(
            '%s/fairs/%s/companies/%s?category=%s',
            $this->getUrl(),
            $fairId,
            $companyId,
            'Empleo'
        );
    }

//    public function testFairCompanySuccess()
//    {
//        $params = self::getParams();
//
//        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(), $params);
//
//        $this->assertEquals(200, $response->statusCode());
//        $this->assertEquals('Se actualizó la empresa correctamente.', $response->body()['message']);
//    }

    public function testFairCompanyErrorDocumentNumber()
    {
        $params = self::getParams();
        unset($params['document_number']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('El campo número de documento es requerido', $response->body()['message']);
    }

    public function testFairCompanyErrorBussinessName()
    {
        $params = self::getParams();
        unset($params['business_name']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('El campo razon social es requerido', $response->body()['message']);
    }

    public function testFairCompanyErrorLogo()
    {
        $params = self::getParams();
        unset($params['logo']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('El campo logo es requerido', $response->body()['message']);
    }

    public function testFairCompanyErrorCategory()
    {
        $params = self::getParams();
        unset($params['category']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(), $params);

        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('El campo categoria es requerido', $response->body()['message']);
    }

    public function testFairCompanyErrorIndustryId()
    {
        $params = self::getParams();
        unset($params['industry_id']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('El campo industria id es requerido', $response->body()['message']);
    }

    public function testFairCompanyErrorIndustry()
    {
        $params = self::getParams();
        unset($params['industry_name']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('El campo industria nombre es requerido', $response->body()['message']);
    }


    private function validateCompanyByRuc($fairId, $ruc)
    {
        /** @var CompanyFair[] $CompanyFair */
        return $this->em->createQueryBuilder()
            ->select('cf')
            ->from('Fairs:Fairs\CompanyFair', 'cf')
            ->innerJoin('cf.company', 'c')
            ->where('cf.fair = :fairId')
            ->andWhere('c.ruc = :ruc')
            ->setParameters([
                'fairId' => $fairId,
                'ruc' => $ruc
            ])
            ->getQuery()
            ->getOneOrNullResult();
    }
}