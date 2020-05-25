<?php

namespace Aptitus\IntegrationTests\Fairs;

use Aptitus\Fairs\Domain\Model\Fairs\Enum\StandType;
use Aptitus\IntegrationTests\Common\AptTestIntegration;

/**
 * Class CompanyMngCreateRulesGoldControllerTest
 *
 * @package Aptitus\IntegrationTests\Fairs
 * @author Ronald Cutisaca <ronaldfox2015@gmail.com>
 * @copyright (c) 2017, Orbis
 */
class CompanyMngCreateRulesGoldControllerTest extends AptTestIntegration

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
            'document_number' => '83521137773',
            'trade_name' => 'ATENTO DEL PERU',
            'business_name' => 'TELEATENTO DEL PERU S.A.C',
            'slug' => 'atento-peru',
            'logo' => 'RTIUR546RT546REEyutsdds42DQA.jpg',
            'category' => 'Empleo',
            'industry_id' => 1,
            'industry_name' => 'Call Center',
            'stand' => [
                'type_id' => StandType::GOLD_ID,
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

    private function getUrlUpdateCompanyFair()
    {
        return sprintf(
            '%s/fairs/%s/companies',
            $this->getUrl(),
            self::FAIR_EXPOAPTITUS_ID
        );
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

    public function testDocumentExistError()
    {
        $params = CompanyInputValidation::getParamsGold();
        $dataValidate = CompanyInputValidation::testDocumentExistError($params);
        $response = $this->request('POST', $dataValidate['url'], $dataValidate['data']);
        $this->assertEquals($dataValidate['code'], $response->statusCode());
        $this->assertEquals($dataValidate['message'], $response->body()['message']);
    }

    public function testDocumentRequiredError()
    {
        $params = CompanyInputValidation::getParamsGold();
        $dataValidate = CompanyInputValidation::testDocumentRequiredError($params);
        $response = $this->request('POST', $dataValidate['url'], $dataValidate['data']);
        $this->assertEquals($dataValidate['code'], $response->statusCode());
        $this->assertEquals($dataValidate['message'], $response->body()['message']);
    }

    public function testDocumentMaxLengthError()
    {
        $params = CompanyInputValidation::getParamsGold();
        $dataValidate = CompanyInputValidation::testDocumentMaxLengthError($params);
        $response = $this->request('POST', $dataValidate['url'], $dataValidate['data']);
        $this->assertEquals($dataValidate['code'], $response->statusCode());
        $this->assertEquals($dataValidate['message'], $response->body()['message']);
    }

    public function testCategoryRequiredError()
    {
        $params = CompanyInputValidation::getParamsGold();
        $dataValidate = CompanyInputValidation::testCategoryRequiredError($params);
        $response = $this->request('POST', $dataValidate['url'], $dataValidate['data']);
        $this->assertEquals($dataValidate['code'], $response->statusCode());
        $this->assertEquals($dataValidate['message'], $response->body()['message']);
    }

    public function testCategoryValuesError()
    {
        $params = CompanyInputValidation::getParamsGold();
        $dataValidate = CompanyInputValidation::testCategoryValuesError($params);
        $response = $this->request('POST', $dataValidate['url'], $dataValidate['data']);
        $this->assertEquals($dataValidate['code'], $response->statusCode());
        $this->assertEquals($dataValidate['message'], $response->body()['message']);
    }

    public function testTradeNameRequiredError()
    {
        $params = CompanyInputValidation::getParamsGold();
        $dataValidate = CompanyInputValidation::testTradeNameRequiredError($params);
        $response = $this->request('POST', $dataValidate['url'], $dataValidate['data']);

        $this->assertEquals($dataValidate['code'], $response->statusCode());
        $this->assertEquals($dataValidate['message'], $response->body()['message']);
    }

    public function testStandImagesSuccess()
    {
        $params = self::getParams();
        $params['document_number'] = rand($params['document_number'],100000000000);
        $rules = $this->validateSqlStandTypeRule($params['stand']['type_id'],'image%');
        $response = $this->request('POST', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(true, self::isValidStandTypeRuleImages($params['stand']['images'], $rules));
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals('Se registró la empresa correctamente.', $response->body()['message']);
    }

    public function testStandColorSuccess()
    {
        $params = self::getParams();
        $params['document_number'] =rand($params['document_number'],100000000000);
        $rules = $this->validateSqlStandTypeRule($params['stand']['type_id'],'color%');
        $response = $this->request('POST', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(true, self::isValidStandTypeRuleColor($params['stand']['colors'],$rules));
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals('Se registró la empresa correctamente.', $response->body()['message']);
    }

    public function testStandAmphitryonSuccess()
    {
        $params = self::getParams();
        $params['document_number'] = rand($params['document_number'],100000000000);
        $rules = $this->validateSqlStandTypeRule($params['stand']['type_id'],'amphitryon%');
        $amphitryonId = $rules[0]['rule'];
        $response = $this->request('POST', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(true, !empty($params['stand'][$amphitryonId]));
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals('Se registró la empresa correctamente.', $response->body()['message']);
    }

    public function testStandVideoSuccess()
    {
        $params = self::getParams();
        $params['document_number'] =rand($params['document_number'],100000000000);
        $rules = $this->validateSqlStandTypeRule($params['stand']['type_id'],'video%');
        $video = $rules[0]['rule'];
        $response = $this->request('POST', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(true, !empty($params['stand'][$video]));
        $this->assertEquals(200, $response->statusCode());
        $this->assertEquals('Se registró la empresa correctamente.', $response->body()['message']);
    }



    /**
     * valida si existe una imagen de image_totem
     */
    public function testFairCompanyErrorImageTotem()
    {
        $params = self::getParams();
        $params['document_number'] =rand($params['document_number'],100000000000);
        $params['stand']['images'] = self::isValidSampleData($params['stand']['images'], 'image_totem');
        $response = $this->request('POST', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Imagen Totem', $response->body()['message']);
    }

    /**
     * valida si existe una imagen de image_banderole_1 image_banderole_2
     */
    public function testFairCompanyErrorImageBanderole()
    {
        $params = self::getParams();
        $params['document_number'] = '12345678915';
        $params['stand']['images'] = self::isValidSampleData($params['stand']['images'], 'image_banderole_1');
        $params['stand']['images'] = self::isValidSampleData($params['stand']['images'], 'image_banderole_2');
        $response = $this->request('POST', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Imagen Banderola 1 - Imagen Banderola 2', $response->body()['message']);
    }


    /**
     * valida si existe una imagen de banderola image_banderole_2
     */
    public function testFairCompanyErrorImageBanderoleTwo()
    {
        $params = self::getParams();
        $params['document_number'] =rand($params['document_number'],100000000000);
        $params['stand']['images'] = self::isValidSampleData($params['stand']['images'], 'image_banderole_2');
        $response = $this->request('POST', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Imagen Banderola 2', $response->body()['message']);
    }

    /**
     * valida si existe una imagen image_top
     */
    public function testFairCompanyErrorImageTop()
    {
        $params = self::getParams();
        $params['document_number'] =rand($params['document_number'],100000000000);
        $params['stand']['images'] = self::isValidSampleData($params['stand']['images'], 'image_top');
        $response = $this->request('POST', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Logo Top', $response->body()['message']);
    }

    /**
     * valida si existe una imagen mostrador
     */
    public function testFairCompanyErrorImageCounter()
    {
        $params = self::getParams();
        $params['document_number'] =rand($params['document_number'],100000000000);
        $params['stand']['images'] = self::isValidSampleData($params['stand']['images'], 'image_counter');
        $response = $this->request('POST', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Imagen Mostrador', $response->body()['message']);

    }

    /**
     * valida si existe una color color_1
     */
    public function testFairCompanyErrorColorOne()
    {
        $params = self::getParams();
        $params['document_number'] =rand($params['document_number'],100000000000);
        unset($params['stand']['colors']['color_1']);
        $response = $this->request('POST', $this->getUrlUpdateCompanyFair(), $params);
        $this->assertEquals(400, $response->statusCode());
        $this->assertEquals('Parámetros no enviados: Color 1', $response->body()['message']);
    }

    /**
     * valida si existe una color color_2
     */
    public function testFairCompanyErrorColorTwo()
    {
        $params = self::getParams();
        $params['document_number'] =rand($params['document_number'],100000000000);
        unset($params['stand']['colors']['color_2']);
        $response = $this->request('POST', $this->getUrlUpdateCompanyFair(), $params);
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

}