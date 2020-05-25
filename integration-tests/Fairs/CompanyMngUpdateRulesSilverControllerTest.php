<?php

namespace Aptitus\IntegrationTests\Fairs;

use Aptitus\Fairs\Domain\Model\Fairs\Enum\CategoryCompany;
use Aptitus\Fairs\Domain\Model\Fairs\Enum\StandType;
use Aptitus\Fairs\Domain\Model\Fairs\CompanyFair;
use Aptitus\IntegrationTests\Common\AptTestIntegration;

/**
 * Class CompanieUpdateControllerTest
 *
 * @package Aptitus\IntegrationTests\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class CompanyMngRulesSilverControllerTest extends AptTestIntegration
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
            'document_number' => '20414989278',
            'trade_name' => 'ATENTO33 DEL PERU',
            'business_name' => 'TELEATENTO33 DEL PERU S.A.C',
            'slug' => 'atento33-peru',
            'logo' => 'RTIUR546RT546REEyutsdds42DQA.jpg',
            'category' => 'Empleo',
            'industry_id' => 1,
            'industry_name' => 'Call Center',
            'stand' => [
                'type_id' => StandType::SILVER_ID,
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
                        'type' => 'image_poster_1'
                    ],
                    [
                        'name' => '5e8edf5ef2bdeb1bd697ed5c4e6aff82.png',
                        'type' => 'image_poster_2'
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

    private function getUrlUpdateCompanyFair($type = CategoryCompany::JOB ,$fairId = self::FAIR_EXPOAPTITUS_ID, $companyId = self::COMPANY_APTITUS_ID)
    {
        return sprintf(
            '%s/fairs/%s/companies/%s?category=%s',
            $this->getUrl(),
            $fairId,
            $companyId,
            $type
        );
    }

    private function validateSqlStandTypeRule($typeId, $type)
    {
        return $this->em->createQueryBuilder()
            ->select('str')
            ->from('Fairs:Fairs\StandTypeRule', 'str')
            ->where('str.standType = :typeId')
            ->andWhere('str.rule LIKE :type')
            ->andWhere('str.state = :state')
            ->setParameters([
                'typeId' => $typeId,
                'type' => $type,
                'state' => 1
            ])
            ->getQuery()
            ->getArrayResult();
    }

    private static function isValidStandTypeRuleImages($params = array(), $rules = array())
    {
        $items = [];
        foreach ($rules as $value) {
            foreach ($params as $v) {
                if (!empty($v['type']) && $value['rule'] == $v['type'] && $value['required']) {
                    $items[] = $value;
                    break;
                }
            }
        }
        return count($rules) == count($items);
    }

    private static function isValidStandTypeRuleColor($params = array(), $rules = array())
    {
        $items = [];
        foreach ($rules as $value) {
            if (!empty($params[$value['rule']]) && $value['required']) {
                $items[] = true;
            }
        }
        return count($rules) == count($items);
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

    public function testStandImagesSuccess()
    {
        $params = self::getParams();
        $rules = $this->validateSqlStandTypeRule($params['stand']['type_id'],'image%');
        /** @var CompanyFair $companyFair */
        $companyFair = $this->validateCompanyByRuc(self::FAIR_EXPOAPTITUS_ID, $params['document_number']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(
            CategoryCompany::JOB,
            self::FAIR_EXPOAPTITUS_ID,
            $companyFair->getCompany()->getId()
        ), $params);
        $this->assertEquals(true, self::isValidStandTypeRuleImages($params['stand']['images'], $rules));
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals('Se actualizó la empresa correctamente.', $response->body()['message']);
    }

    public function testStandColorSuccess()
    {
        $params = self::getParams();
        $rules = $this->validateSqlStandTypeRule($params['stand']['type_id'],'color%');
        /** @var CompanyFair $companyFair */
        $companyFair = $this->validateCompanyByRuc(self::FAIR_EXPOAPTITUS_ID, $params['document_number']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(
            CategoryCompany::JOB,
            self::FAIR_EXPOAPTITUS_ID,
            $companyFair->getCompany()->getId()
        ), $params);
        $this->assertEquals(true, self::isValidStandTypeRuleColor($params['stand']['colors'],$rules));
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals('Se actualizó la empresa correctamente.', $response->body()['message']);
    }

    public function testStandAmphitryonSuccess()
    {
        $params = self::getParams();
        $params['category'] = CategoryCompany::JOB;
        $rules = $this->validateSqlStandTypeRule($params['stand']['type_id'],'amphitryon%');
        $amphitryonId =  $rules[0]['rule'];
        /** @var CompanyFair $companyFair */
        $companyFair = $this->validateCompanyByRuc(self::FAIR_EXPOAPTITUS_ID, $params['document_number']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(
            CategoryCompany::JOB,
            self::FAIR_EXPOAPTITUS_ID,
            $companyFair->getCompany()->getId()
        ), $params);
        $this->assertEquals(true, !empty($params['stand'][$amphitryonId]));
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals('Se actualizó la empresa correctamente.', $response->body()['message']);
    }

    public function testStandVideoSuccess()
    {
        $params = self::getParams();
        $params['category'] = CategoryCompany::JOB;
        $rules = $this->validateSqlStandTypeRule($params['stand']['type_id'],'video%');
        $video = $rules[0]['rule'];
        /** @var CompanyFair $companyFair */
        $companyFair = $this->validateCompanyByRuc(self::FAIR_EXPOAPTITUS_ID, $params['document_number']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(
            CategoryCompany::JOB,
            self::FAIR_EXPOAPTITUS_ID,
            $companyFair->getCompany()->getId()
        ), $params);
        $this->assertEquals(true, !empty($params['stand'][$video]));
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals('Se actualizó la empresa correctamente.', $response->body()['message']);
        return $params;
    }


    public function testFairCompanyErrorImageTotem()
    {
        $params = self::getParams();
        $params['stand']['images'] = self::isValidSampleData($params['stand']['images'], 'image_totem');
        /** @var CompanyFair $companyFair */
        $companyFair = $this->validateCompanyByRuc(self::FAIR_EXPOAPTITUS_ID, $params['document_number']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(
            CategoryCompany::JOB,
            self::FAIR_EXPOAPTITUS_ID,
            $companyFair->getCompany()->getId()
        ), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Imagen Totem', $response->body()['message']);
        return $params;
    }


    public function testFairCompanyErrorImagePosterOne()
    {
        $params = self::getParams();
        $params['stand']['images'] = self::isValidSampleData($params['stand']['images'], 'image_poster_1');
        /** @var CompanyFair $companyFair */
        $companyFair = $this->validateCompanyByRuc(self::FAIR_EXPOAPTITUS_ID, $params['document_number']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(
            CategoryCompany::JOB,
            self::FAIR_EXPOAPTITUS_ID,
            $companyFair->getCompany()->getId()
        ), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Poster 1', $response->body()['message']);
        return $params;
    }



    public function testFairCompanyErrorImageTop()
    {
        $params = self::getParams();
        $params['stand']['images'] = self::isValidSampleData($params['stand']['images'], 'image_top');
        /** @var CompanyFair $companyFair */
        $companyFair = $this->validateCompanyByRuc(self::FAIR_EXPOAPTITUS_ID, $params['document_number']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(
            CategoryCompany::JOB,
            self::FAIR_EXPOAPTITUS_ID,
            $companyFair->getCompany()->getId()
        ), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Logo Top', $response->body()['message']);

    }

    /**
     * valida si existe una imagen image_counter
     */
    public function testFairCompanyErrorImageCounter()
    {
        $params = self::getParams();
        $params['category'] = CategoryCompany::JOB;
        $params['stand']['images'] = self::isValidSampleData($params['stand']['images'], 'image_counter');
        /** @var CompanyFair $companyFair */
        $companyFair = $this->validateCompanyByRuc(self::FAIR_EXPOAPTITUS_ID, $params['document_number']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(
            CategoryCompany::JOB,
            self::FAIR_EXPOAPTITUS_ID,
            $companyFair->getCompany()->getId()
        ), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Imagen Mostrador', $response->body()['message']);
    }


    /**
     * valida si existe una color color_1
     */
    public function testFairCompanyErrorColorOne()
    {
        $params = self::getParams();
        $params['category'] = CategoryCompany::JOB;
        unset($params['stand']['colors']['color_1']);
        /** @var CompanyFair $companyFair */
        $companyFair = $this->validateCompanyByRuc(self::FAIR_EXPOAPTITUS_ID, $params['document_number']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(
            CategoryCompany::JOB,
            self::FAIR_EXPOAPTITUS_ID,
            $companyFair->getCompany()->getId()
        ), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Color 1', $response->body()['message']);
    }

    /**
     * valida si existe una color color_2
     */
    public function testFairCompanyErrorColorTwo()
    {
        $params = self::getParams();
        unset($params['stand']['colors']['color_2']);
        /** @var CompanyFair $companyFair */
        $companyFair = $this->validateCompanyByRuc(self::FAIR_EXPOAPTITUS_ID, $params['document_number']);
        $response = $this->request('PUT', $this->getUrlUpdateCompanyFair(
            CategoryCompany::JOB,
            self::FAIR_EXPOAPTITUS_ID,
            $companyFair->getCompany()->getId()
        ), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Color 2', $response->body()['message']);
    }

    public static function isValidSampleData($data, $type)
    {
        $items = [];
        foreach ($data as $value) {
            if ($value['type'] != $type) {
                $items[] = $value;
            }
        }
        return $items;
    }
}